<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\song;

use Faker\Generator as Faker;

class songSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run(Faker $faker)
    {

      for($i = 0; $i < 15; $i++){
        $new_song = new song;
  
  
        $new_song->title = $faker->words(2, true);
        $new_song->album = $faker->words(5, true);
        $new_song->author = $faker->firstName();
        $new_song->editor = $faker->firstName();
        $new_song->length = '3.15';
        $new_song->poster = 'https://picsum.photos/200/200';
  
  
        $new_song->save();
      }
    }
}
