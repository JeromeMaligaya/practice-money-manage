<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Category;
use App\Models\Catergory;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $account = Account::first();
        $categories = Category::all();

        for ($i = 0; $i < 10; $i++) {
            Transaction::create([
                'account_id' => $account->id,
                'category_id' => $categories->random()->id,
                'type' => $faker->randomElement(['in', 'out', 'transfer']),
                'amount' => $faker->randomFloat(2, 10, 1000),
                'description' => $faker->sentence(),
                'date' => $faker->date(),
            ]);
        }
    }
}
