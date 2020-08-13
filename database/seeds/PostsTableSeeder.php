<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Post;
use App\Notifications\PostCreated;
use Illuminate\Support\Facades\Notification;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new \App\Post([
            'title' => 'More pupils return to Scotland\'s schools',

            'content' => 'Face masks will only have to be worn by staff who cannot effectively social distance, 
            however anyone who wishes to wear one should be allowed.
            School buses are treated as part of the school building, so normal distancing or face covering rules 
            do not apply to pupils, but they will have to sanitise their hands prior to boarding.
        
            How are the schools in my area reopening?
            Local authorities across Scotland are taking different approaches with the time frame for reopening.
            Argyll and Bute Council, Dumfries and Galloway Council, East Renfrewshire Council and Moray Council 
            welcomed all pupils back full time on Wednesday.
            Many children who attend school in the Aberdeen City, Aberdeenshire, Angus, Clackmannanshire, Dundee 
            City, East Ayrshire, East Dunbartonshire, East Lothian, Edinburgh City, Falkirk, Fife, Glasgow City, 
            Highland, Inverclyde, Midlothian, North Ayrshire, North Lanarkshire, Orkney Islands, Perth and 
            Kinross, Renfrewshire, South Ayrshire, South Lanarkshire, Stirling, West Dunbartonshire, West 
            Lothian and Western Isles council areas are returning to school on a phased basis.
            All pupils will be back in school on a full-time basis by Tuesday 18 August at the latest.
            
            Weather disruption
            The reopening of a number of schools in Fife and the north east has been delayed due to flooding.
            Fife Council said some schools, which were due to accept pupils for the first time since lockdown, 
            had been affected with power and building problems. Glenrothes and Lochgelly high schools are closed, 
            as are Auchtertool, Benarty Burntisland, Cardenden, Collydean, Denend, Kinghorn, Kinglassie, St Ninians, 
            Torbain, Torryburn and Valley primary schools and their associated nurseries. Freuchie Nursery is 
            also closed, while Fair Isle Primary School is partially closed.
            
            In Aberdeenshire, Mackie Academy in Stonehaven said it could not accept pupils after roads to the 
            town became impassable. Dunnottar school also said it could not reopen after lockdown after 
            the area around the building was completely flooded and impassable even on foot. Banchory-Devenick 
            School, Carronhill School, Glenbervie School, Hillside School, Johnshaven School, Lairhillock School, 
            Mackie Academy, Mearns Academy, Mill O\' Forest School, Peterhead Central School, Portlethen Academy 
            and School and Rothienorman School will also all remain closed.',

            'user_id' => '1'
        ]);
        $post->save();
        $post->tags()->attach([31]);

        $user = User::find('1');
        $users = User::where('id', '!=', '1')->get();
        $post_id = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->first()->id;
        Notification::send($users, new PostCreated($user, $post_id));

        $post = new \App\Post([
            'title' => 'Boris Johnson warns \'long, long way to go\' for UK economy',

            'content' => 'Boris Johnson has warned the UK has a "long, long way to go" before the economy improves, 
            after official figures showed the largest drop in employment in over a decade.

            "Clearly there are going to be bumpy months ahead and a long, long way to go," the Prime Minister said.
            However, he said parts of the economy were "showing great resilience".
            Between April and June, the number of people in work fell by 220,000, the Office for National 
            Statistics said.
            
            The drop in the number of people employed was the largest quarterly decrease since May to July 2009, 
            the depths of the financial crisis. Mr Johnson said he had "absolutely no doubt" that government schemes 
            would "help this country get through it", adding: "it will get through it stronger than ever before".

            The youngest workers, oldest workers and those in manual occupations were the worst hit during the 
            pandemic, the ONS added. The figures do not include the millions of people who are furloughed, those on zero-hours contracts 
            but not getting shifts, or people on temporary unpaid leave from a job, as they still count as employed.
            As such, they do not capture the full impact of the pandemic. Similarly, the UK unemployment rate was 
            estimated at 3.9%, largely unchanged on the year and the previous quarter.',
            
            'user_id' => '1'
        ]);
        $post->save();
        $post->tags()->attach([11, 21]);
        
        $user = User::find('11');
        $users = User::where('id', '!=', '11')->get();
        $post_id = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->first()->id;
        Notification::send($users, new PostCreated($user, $post_id));

        $post = new \App\Post([
            'title' => '5G: Finally, it\'s here in the UK - so what is it?',

            'content' => 'After years of hype - and sometimes confusion - the UK finally has a 5G network.

            BT\'s EE subsidiary is the first to launch a service - and if you\'re feeling wealthy enough and 
            live in the right place, you can sign up.
            
            The lowest-priced deal is £54 a month plus a one-off £170 fee for a compatible handset.
            But bear in mind that buys you only 10GB of data a month, which you will be likely to chew through 
            fairly quickly if you take advantage of the next-generation technology to download lots of media.
            
            For many people, it may make sense to wait - and not just to take advantage of rival offers from 
            Vodafone, which starts its own 5G service in about five weeks.
            The two operators are launching in select cities only.
            And even there, the connectivity will be patchy, sometimes offering only outdoor connectivity, 
            sometimes none at all - so customers will probably default to a slower 4G signal much of the time.
            
            Chip-maker Qualcomm has promised the first 5G phones will offer "all-day battery life" - but second- 
            and third-generation modems will inevitably be more energy-efficient and thus allow handset-makers to 
            offer either longer life between charges or thinner phones.

            What\'s more, many of the innovations that promise to make 5G truly disruptive have yet to arrive. 
            But more on that in a bit.',
            
            'user_id' => '11'
        ]);
        $post->save();
        $post->tags()->attach([11, 51]);

        $user = User::find('11');
        $users = User::where('id', '!=', '11')->get();
        $post_id = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->first()->id;
        Notification::send($users, new PostCreated($user, $post_id));

        $post = new \App\Post([
            'title' => 'Online political campaigning \'to be more transparent\'',

            'content' => 'Wild West\'
            Online political advertising is largely unregulated in the UK and campaign material is not required 
            by law to be truthful or factually accurate, or to say who is paying for it.
            
            Last year the Electoral Reform Society, which campaigns for changes to the voting system, described 
            it as being like the "Wild West" and subject to rules stuck in the "analogue age".
            
            The Conservative Party has itself been accused of misleading voters when it rebranded its press 
            office Twitter account as Fact Check UK during a TV debate at the 2019 general election.
            The then party chairman James Cleverly said the Twitter feed had been clearly labelled "CCHQ press".
            
            Unveiling the government proposals, promised in last year\'s Queen\'s Speech, Constitutional Affairs 
            Minister Chloe Smith said: "Voters value transparency.
            
            "So we must ensure that there are clear rules to help them see who is behind campaign content online."
            She claimed these would help create "one of the most comprehensive sets of regulations operating in 
            the world today".
            
            Under the government\'s plans, a "digital imprint" would have to be displayed as part of online content 
            - such as a video or a graphic.
            But the government says that "where this is not possible" it should be located in an "accessible 
            alternative location linked to the material".
            
            Ministers want registered political parties, registered third parties, political candidates, elected 
            office holders and registered referendum campaigners to put an imprint on their digital campaign material 
            whether it is paid-for advertising or "organic" content - where no professional advertiser is paid to 
            promote and distribute it.',
            
            'user_id' => '21'
        ]);
        $post->save();
        $post->tags()->attach([61]);

        $user = User::find('21');
        $users = User::where('id', '!=', '21')->get();
        $post_id = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->first()->id;
        Notification::send($users, new PostCreated($user, $post_id));

        $post = new \App\Post([
            'title' => 'Retail sales rise despite fewer High Street visits',

            'content' => 'Retail sales rose again in July, but shops are still trying to make up lost ground, 
            industry body figures suggest.
            They show the number of visits to High Streets is still down significantly as people shop 
            online instead.
            
            The British Retail Consortium (BRC) said some retailers continue to struggle due to the coronavirus 
            crisis, and it made a fresh call for government help with rents.
            The housing ministry said landlords and tenants should "find solutions that work for both parties".
            
            May \'another month of struggle for retailers\'
            Retail sales jump in June - \'but crisis not over\'
            Retail sales rose for the second consecutive month in July, the BRC said, up 3.2% compared with 
            the same month last year. But the picture for retailers was mixed.
            Food sales continued to be strong, while furniture and homeware sales also did well as people 
            "increasingly invest in their time at home", the BRC-KPMG retail sales report found.
            
            Online shopping remained "prominent" in July, accounting for 40% of sales, said Paul Martin, UK 
            head of retail at KPMG. Computer sales also continued to soar as people who could worked from home, he said.
            Food and alcohol sales slowed but drink sales still made a significant contribution to supermarket 
            growth, Susan Barratt, the chief executive of grocery research organisation IGD said.
            
            And while local coronavirus lockdowns in the north of England had taken a toll on consumer 
            confidence in the region, morale was higher in Scotland, she said.',
            
            'user_id' => '41'
        ]);
        $post->save();
        $post->tags()->attach([31]);

        $user = User::find('41');
        $users = User::where('id', '!=', '41')->get();
        $post_id = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->first()->id;
        Notification::send($users, new PostCreated($user, $post_id));
    }
}
