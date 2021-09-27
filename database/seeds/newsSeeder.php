<?php
use App\Article;
use App\Author;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class newsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $authorList = [   //autori 
            'Dante Alighieri',
            'Italo Calvino',
            'Giacomo Leopardi',
            'Umberto Eco',
            'Bardi Fisniku',
            'Ottavio',
        ];

        $imgArticleList = [ //img
            'https://www.italiaatavola.net/images/contenutiarticoli/dante-in-vigna.jpg',
            'https://voce.com.ve/wp-content/uploads/2017/09/dante_e_il_suo_poema.jpg',
            'https://images-na.ssl-images-amazon.com/images/I/71dg56sfNHL.jpg',
            'https://i.pinimg.com/originals/b8/a2/fc/b8a2fcf15c0cf9f1d9251740c6d2624b.jpg',
            'https://i2.res.24o.it/images2010/Editrice/ILSOLE24ORE/INSERTI/2019/11/08/Broadsheet/Grafica1/Immagini/1046292-kK5H--1020x533@IlSole24Ore-Web.jpg',
            'https://pbs.twimg.com/media/Cq2vvvNW8AALfVy.jpg',
            'https://www.illibraio.it/wp-content/uploads/2019/09/1AAAAGettyImages-1129598009.jpg',
            'https://lh3.googleusercontent.com/proxy/63z0Cm_xcaVCWM2Ph4UzhYDPB3UkyFI2jwe2Uif1uJahmkEEP4zkVinQQKq0Fe0DjVj-jDpiVc4tt0spl_Zro-Vx5PEGM3fjMugjW91hGvj9tg',
            'https://i.ytimg.com/vi/0WDytys-EEs/maxresdefault.jpg',
            'https://i.ytimg.com/vi/Jlv_fdB4cTY/maxresdefault.jpg',
        ];

        $authorListID = []; // qui popoliamo i nostri id di author

        for($x = 0; $x < 20; $x++) {

            $authorObject = new Author();
            $authorObject->name =  $faker->word(1);
            $authorObject->surname =  $faker->word(1);
            $authorObject->email = $faker->email();
            $authorObject->picture = $faker->imageUrl(250, 250, 'imgAuthor', true);
            $authorObject->save();
            $authorListID[] = $authorObject->id;
        }


        for ($x = 0; $x < 20; $x++) {
            $articleObject = new Article();
            $articleObject->title = $faker->sentence(2);
            $articleObject->text = $faker->sentence(30);
            //
            $randImageKey = array_rand($imgArticleList, 1); //img random
            $image = $imgArticleList[$randImageKey]; //nuova variabile per l'img random
            $articleObject->cover = $image; //definire nel db
            // $articleObject->cover = $faker->imageUrl(400, 400, 'imgArticle', true);
            $randAuthorKey = array_rand($authorListID, 1); //img random
            $authorID = $authorListID[$randAuthorKey]; //uova variabile
            $articleObject->authors_id = $authorID; //definire nel db
            //
            $articleObject->save();
        }
    }
}
