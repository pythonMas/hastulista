<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['order'=>1,'name' => 'Ar Technology', 'slug' => 'ar-technology', 'created_at' => $now, 'updated_at' => $now],
            ['order'=>1,'name' => 'Arte y diseño', 'slug' => 'arte-y-diseño', 'created_at' => $now, 'updated_at' => $now],
            ['order'=>1,'name' =>'Escolar' , 'slug' => 'escolar', 'created_at' => $now, 'updated_at' => $now],
            ['order'=>1,'name' => 'Juguetes', 'slug' => 'juguetes', 'created_at' => $now, 'updated_at' => $now],
            ['order'=>1,'name' => 'Lectura', 'slug' => 'lectura', 'created_at' => $now, 'updated_at' => $now],
            ['order'=>1,'name' => 'Oficina', 'slug' => 'oficina', 'created_at' => $now, 'updated_at' => $now],
            ['order'=>1,'name' => 'Papeleria', 'slug' => 'papeleria', 'created_at' => $now, 'updated_at' => $now],
            ['order'=>1,'name' => 'Tecnologia', 'slug' => 'tecnologia', 'created_at' => $now, 'updated_at' => $now],
            ['order'=>1,'name' => 'Tv, Audio y Fotografia', 'slug' => 'tv-audio-y-fotografia', 'created_at' => $now, 'updated_at' => $now]
        ]);
    }
}
