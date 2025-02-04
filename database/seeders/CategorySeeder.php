<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Catergory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoriesList = ['salary', 'investment', 'gift', 'rent', 'grocery', 'transportation', 'taxes', 'shopping', 'travel'];

        foreach ($categoriesList as $category) {
            Category::create(['name' => $category]);
        }
    }
}
