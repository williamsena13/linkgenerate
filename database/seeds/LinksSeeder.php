<?php

use Illuminate\Database\Seeder;

class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('links')->insert([
            'title' => "Link Legal",
            'url' =>  'https://gmail.com' ,
            'default_url' =>  'https://github.com/williamsena13' ,
            'limit_clicks' => random_int(0,9999),
            'status' => 2
        ]);

        DB::table('links')->insert([
            'title' => 'Melhor Link',
            'url' =>  'https://google.com' ,
            'default_url' =>  'https://github.com/williamsena13',
            'limit_clicks' => random_int(0,9999),
            'status' => 1
        ]);
        DB::table('links')->insert([
            'title' => 'Aquele Link',
            'url' => 'https://facebook.com' ,
            'default_url' =>  'https://github.com/williamsena13',
            'limit_clicks' => random_int(0,9999),
            'status' => 1
        ]);
        DB::table('links')->insert([
            'title' => 'Link Outro',
            'url' => 'https://www.instagram.com',
            'default_url' =>  'https://github.com/williamsena13',
            'limit_clicks' => random_int(0,9999),
            'status' => 1
        ]);
        /*
        for ($i=0; $i < 50; $i++) {
            # code...
            DB::table('links')->insert([
                'title' => Str::random(10),
                'url' =>  'https://' . Str::slug( Str::random(10) , '-') . '.com' ,
                'default_url' =>  'https://' . Str::slug( Str::random(10) , '-') . '.com' ,
                'limit_clicks' => random_int(0,9999),
                'status' => 1
            ]);
        }
        */
    }
}
