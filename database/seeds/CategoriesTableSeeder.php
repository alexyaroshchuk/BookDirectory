<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryTitles = ['Crime', 'Detective fiction', 'Science fiction', 'Post-apocalyptic', 'Distopia',
            'Cyberpunk', 'Fantasy', 'Romance novel', 'Western', 'Horror', 'Classic', 'Fairy tale', 'Fan fiction'];

        foreach ($categoryTitles as $categoryTitle) {
            \App\Models\Category::create([
                'title' => $categoryTitle
            ]);
        }
    }
}
