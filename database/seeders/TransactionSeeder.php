<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $users = User::all();


        Transaction::factory(25)
            ->recycle($users)
            ->recycle($categories)
            ->create();
    }
}
