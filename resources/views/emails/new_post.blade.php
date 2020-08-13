@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name', 'Financegram') }}
        @endcomponent
    @endslot

{{-- Body --}}
    <b>Congratulations,</b> {{ $userName }}!
    <br><br>
    You have just published a new article: 
    "{{ $newPost->title }}".
    <br><br>
    Have a great day!

{{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            &copy; {{now()->year}} Made by 
            <a class="themeColor" href="https://www.linkedin.com/in/teodor-tita/">Teodor T.</a>
        @endcomponent
    @endslot
@endcomponent