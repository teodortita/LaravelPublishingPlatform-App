<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Post;
use App\Tag;
use Auth;
use Gate;
use DB;
use App\User;
use App\Notifications\PostCreated;
use Notification;

use App\Jobs\MailUser;
use App\Mail\NewPost;

class PostController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('blog.index', ['posts' => $posts]);
    }

    public function getUserPosts($id)
    {
        if (User::where('id', $id)->first()) {
            $user = User::where('id', $id)->first();
            $posts = Post::orderBy('created_at', 'desc')->where('user_id', $id)->paginate(3);
            return view('blog.index', ['user' => $user,'posts' => $posts]);
        }
        else {
            return redirect()->back();
        }
    }

    public function getTagPosts($tag_name)
    {
        $tag_name = ucfirst($tag_name);
        if (Tag::where('name', $tag_name)->first()) {
            $searchedTag = Tag::where('name', $tag_name)->first();
            $searchedTagId = $searchedTag->id;
            $searchedPosts = DB::table('post_tag')->where('tag_id', $searchedTagId)->get();
            $iterator = 0;
            foreach ($searchedPosts as $post) {
                $array[$iterator++] = $post->post_id;
            }
            $posts = Post::orderBy('created_at', 'desc')->whereIn('id', $array)->paginate(3);
            return view('blog.index', ['tag_name' => $tag_name, 'posts' => $posts]);
        }
        else {
            return redirect()->back();
        }
    }

    public function getAdminIndex()
    {
        if (!Auth::check()) {
            return redirect()->back();
        }
        $user = Auth::user();
        $posts = Post::orderBy('updated_at', 'desc')->where('user_id', $user->id)->get();
        return view('admin.index', ['posts' => $posts]);
    }

    public function markRead($notification_id)
    {
        foreach (Auth::user()->unreadNotifications as $iterator) {
            if ($iterator->id == $notification_id) {
                $post_id = $iterator->data['post_id'];
                $iterator->markAsRead();
            }
        }
        if ($post_id) {
            return $this->getPost($post_id);
        }
        else {
            return redirect()->back();
        }
    }

    public function getPost($id)
    {
        if (Post::where('id', $id)->first()) {
            $post = Post::where('id', $id)->first();
            return view('blog.post', ['post' => $post]);
        }
        else {
            return $this->getIndex();
        }
    }

    public function getLikePost($id)
    {
        $post = Post::where('id', $id)->with('likes')->first();
        $like = new Like();
        $post->likes()->save($like);
        return redirect()->back();
    }

    public function getAdminCreate()
    {
        if (!Auth::check()) {
            return redirect()->back();
        }
        $tags = Tag::all();
        return view('admin.create', [
            'tags' => $tags
        ]);
    }

    public function getAdminEdit($id)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }
        $post = Post::find($id);
        if (Gate::denies('manipulate-post', $post)) {
            return redirect()->route('admin.index')->with('danger', 'Puteti edita/sterge doar articolele care va apartin!');
        }
        $tags = Tag::all();
        return view('admin.edit', [
            'post' => $post,
            'postId' => $id,
            'tags' => $tags    
        ]);
    }

    public function getAdminDelete($id)
    {
        $post = Post::find($id);
        if (Gate::denies('manipulate-post', $post)) {
            return redirect()->route('admin.index')->with('danger', 'Puteti edita/sterge doar articolele care va apartin!');
        }
        $post->likes()->delete();
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.index')->with('info', 'Articol sters!');
    }

    public function postAdminCreate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:100',
            'content' => 'required|min:10|max:2000',
            'tags' => 'required'
        ]);
        if (!Auth::check()) {
            return redirect()->back();
        }
        $user = Auth::user();
        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        $user->posts()->save($post);

        //$post->tag($request->input('tags'));
        $post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));
        
        $users = User::where('id', '!=', auth()->id())->get();
        $post_id = Post::orderBy('created_at', 'desc')->first()->id;
        Notification::send($users, new PostCreated($user, $post_id));

        MailUser::dispatch($user, new NewPost($user))
            ->delay(now()->addMinutes(2));

        return redirect()->route('admin.index')->withInput()->with('info', 'Articol creat - Titlul este: '.$request->input('title'));
    }

    public function postAdminUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:100',
            'content' => 'required|min:10|max:2000'
        ]);
        $post = Post::find($request->input('id'));
        if (Gate::denies('manipulate-post', $post)) {
            return redirect()->route('admin.index')->with('danger', 'Puteti edita/sterge doar articolele care va apartin!');
        }
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        $post->tags()->sync($request->input('tags') === null ? [] : $request->input('tags'));
        
        return redirect()->route('admin.index')->with('info', 'Articol editat, noul Titlu este: '.$request->input('title'));
    }
}
