<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'route' => '/',
            'text' => '<h1>Приветствую вас!</h1><p>Это текстовая страница вашего замечательного сайта! Эту страницу можно в админ панели.</p>',
            'seo_title' => 'Демонстрационная страница',
            'seo_description' => 'Эта страница - демонстрация',
            'seo_keywords' => 'страница,демо,тест'
        ]);
    }
}
