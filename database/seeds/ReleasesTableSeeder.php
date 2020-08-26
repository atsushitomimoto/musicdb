<?php

use Illuminate\Database\Seeder;

class ReleasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('releases')->insert([
            'title' => '三毒史',
            'artist' => '椎名林檎',
            'length' => '43:34',
        ]);
        
        DB::table('releases')->insert([
            'title' => '834.194',
            'artist' => 'サカナクション',
        ]);

        DB::table('releases')->insert([
            'title' => 'FLAME VEIN',
            'artist' => 'BUMP OF CHICKEN',
        ]);
    }
}
