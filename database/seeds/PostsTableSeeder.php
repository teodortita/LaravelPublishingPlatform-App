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
            'title' => 'BANCA TRANSILVANIA ACHIZIŢIONEAZĂ CERTINVEST PENSII',

            'content' => 'Grupul Financiar Banca Transilvania a anunţat în octombrie 2019 intenţia de a-şi extinde 
            serviciile financiare pentru cei peste 3 milioane de clienți printr-o investiție în domeniul pensiilor 
            private. Tot atunci a avut loc semnarea, în Bucureşti, a unui agajament ferm între BT Asset Management, 
            BT Investments şi Certinvest Pensii privind achiziţia. „Pornim cu aproape 10.000 de clienţi şi cu peste 
            75 de milioane de lei în administrare. Urmează o perioadă de integrare a Certinvest în Grupul Financiar 
            BT şi de pregătire pentru clienţi. Ne adresăm celor care îşi stabilesc un plan cu bătaie lungă privind 
            pensia privată, apropiaţi ai brandului BT. Mulţumim autorităţilor pentru suportul acordat”, declară Aurel 
            Bernat, Director General, BT Asset Management.',

            'user_id' => '1'
        ]);
        $post->save();
        $post->tags()->attach([3]);

        $user = User::find('1');
        $users = User::where('id', '!=', '1')->get();
        $post_id = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->first()->id;
        Notification::send($users, new PostCreated($user, $post_id));

        $post = new \App\Post([
            'title' => 'CEC BANK LANSEAZĂ CONTUL DE ECONOMII ÎN LEI',

            'content' => 'CEC Bank, banca românească cu cea mai lungă tradiție și cea mai extinsă rețea din România, 
            lansează contul de economii în lei pentru clienții persoane juridice, prin intermediul căruia aceștia au 
            posibilitatea de a face oricând depuneri cu dobânzi bonificate sau retrageri, potrivit băncii. ”Prin lansarea 
            contului de economii în lei, CEC Bank își divesifică oferta de produse bancare de economisire destinate 
            clienților persoane juridice. La nivelul sistemului bancar din România, segmentul companiilor are o pondere 
            importantă în totalul depozitelor. Astfel, vrem să oferim clienților persoane juridice soluții care să 
            permită acumularea capitalurilor necesare diferitelor proiecte, în condiții de flexibilitate și cu dobânzi 
            avantajoase”, a declarat Bogdan Neacșu , președinte director general al CEC Bank.',
            
            'user_id' => '1'
        ]);
        $post->save();
        $post->tags()->attach([1, 2]);
        
        $user = User::find('1');
        $users = User::where('id', '!=', '1')->get();
        $post_id = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->first()->id;
        Notification::send($users, new PostCreated($user, $post_id));

        $post = new \App\Post([
            'title' => 'CUM VA AFECTA CORONAVIRUSUL BĂNCILE DIN CHINA?',

            'content' => 'Răspândirea rapidă a coronavirusului este o lovitură severă pentru economia mondială. Desigur, 
            amploarea pagubelor depind de cât de rapid și de cât de eficient este stopat focarul. Indiferent de traiectoria 
            epidemiei, acesta este un moment important pentru economia Chinei. În perioadele cu probleme economice, 
            China își “îndreaptă” fața către bănci. A fost calea folosită de guvern pentru a pompa bani în economie, 
            în criza de acum 10 ani. Iar analiștii de la The Banker consideră că este tot mai clar că băncile vor fi 
            cele chemate, din nou, pentru a sprijini economia, după criza cu răspândirea coronavirusului.',
            
            'user_id' => '1'
        ]);
        $post->save();
        $post->tags()->attach([1, 5]);

        $user = User::find('1');
        $users = User::where('id', '!=', '1')->get();
        $post_id = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->first()->id;
        Notification::send($users, new PostCreated($user, $post_id));

        $post = new \App\Post([
            'title' => 'START OFICIAL PENTRU PRIMA CASĂ 2020',

            'content' => 'Fondul National de Garantare a Creditelor pentru IMM-uri (FNGCIMM) anunta lansarea Programului 
            Prima Casa 2020, ca urmare a primirii, din partea Ministerului Finantelor Publice, a acordului de distribuire 
            pentru suma de 1,98 miliarde lei din plafonul total de 2 miliarde lei, alocat pentru anul 2020 prin Hotararea 
            de Guvern nr.112/2020, publicata in Monitorul Oficial nr.100 din data de 11 februarie 2020. Programul Prima Casa 
            2020 beneficiaza de aceleasi conditii de garantare din partea statului roman, in favoarea finantarilor acordate 
            de catre cele 14 banci participante in program: BRD-GSG, BCR, Banca Transilvania, CEC Bank, ING Bank, Raiffeisen 
            Bank, OTP Bank, Banca Romaneasca, Unicredit Bank, Garanti Bank, First Bank, Marfin Bank, Leumi Bank si 
            Intesa Sanpaolo Bank.',
            
            'user_id' => '2'
        ]);
        $post->save();
        $post->tags()->attach([6]);

        $user = User::find('2');
        $users = User::where('id', '!=', '2')->get();
        $post_id = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->first()->id;
        Notification::send($users, new PostCreated($user, $post_id));

        $post = new \App\Post([
            'title' => 'SUEDIA TESTEAZĂ MONEDĂ DIGITALĂ',

            'content' => 'Riksbank, banca centrală a Suediei și cea mai veche bancă centrală din lume este deschisă la 
            nou și testează monedă digitală denumită e-krona. Banca derulează un proiect pilot cu Accenture pentru a 
            dezvolta o soluție tehnică pentru prima moneda electronica – e-Krona – lansată de o Banca Centrală. Aceasta 
            va funcționa ca o completare a numerarului, iar proiectul urmărește să arăte dacă e-krona ar putea fi utilizată 
            de publicul larg, potrivit unui comunicat de presă al Riksbank. O e-krona digitală ar trebui să fie simplă, 
            ușor de utilizat și să îndeplinească cerințele critice pentru securitate și performanță. În teste, utilizatorii 
            vor putea să dețină e-krona într-un portofel digital, să efectueze plăți, depuneri și retrageri prin intermediul 
            unei aplicații mobile.',
            
            'user_id' => '4'
        ]);
        $post->save();
        $post->tags()->attach([3]);

        $user = User::find('4');
        $users = User::where('id', '!=', '4')->get();
        $post_id = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->first()->id;
        Notification::send($users, new PostCreated($user, $post_id));
    }
}
