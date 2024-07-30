<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->count(5)->create();

        // User::factory(5)->create();
        // User::factory()
        //     ->count(5)
        //     ->hasTransactions(5)
        //     ->create();

        // Create categories first
        // $categories = Category::factory(5)->create();

        // $transactions = Transaction::factory()->count(5)->create();






        // foreach ($transactions as $transaction) {
        //     $transaction->category_id = $categories->random()->id;


        //     $transaction->user_id = User::all()->random()->id;

        //     $transaction->create();
        // }
    }
}
