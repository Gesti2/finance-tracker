<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {





        foreach (User::all() as $user) {

            $category = Category::inRandomOrder()->first();

            $transactions = Transaction::factory(4)->create([
                "user_id" => $user->id,
                "category_id" => $category->id,
            ]);
        }

        // Transaction::factory()->create()->each(function (Transaction $transaction) {

        //     $category = Category::inRandomOrder()->first();
        //     $transaction->category_id = $category->id;

        //     $user = User::inRandomOrder()->first();
        //     $transaction->user_id = $user->id;
        // });
        //enos
        // $categories = Category::factory()->count(3)->create();

        // User::factory()->count(5)->create()->each(function ($user) {
        //     $transactions = Transaction::factory()->count(5)->make();

        //     $transactions->each(function ($transaction) use ($user) {
        //         $category = Category::inRandomOrder()->first();
        //         $transaction->user_id = $user->id;
        //         $transaction->category_id = $category->random()->id;
        //         $transaction->save();
        //     });
        // });

        // $categories = Category::factory()->count(3)->create();

        // // Create 5 users, each with 5 transactions
        // User::factory()->count(5)->create()->each(function ($user) use ($categories) {
        //     $transactions = Transaction::factory()->count(5)->make();

        //     $transactions->each(function ($transaction) use ($user, $categories) {
        //         $transaction->user_id = $user->id;
        //         $transaction->category_id = $categories->random()->id;
        //         $transaction->save();
        //     });
        // });

        // $transactions = Transaction::factory(5)->create();

        // Category::factory(3)->hasAttached($transactions)->create();
    }
}
