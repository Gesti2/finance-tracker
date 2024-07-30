<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory(3)->create();


        // $categories = [
        //     ['name' => 'Groceries'],
        //     ['name' => 'Utilities'],
        //     ['name' => 'Entertainment'],
        //     ['name' => 'Transport'],
        //     ['name' => 'Healthcare'],
        //     ['name' => 'Education'],
        //     ['name' => 'Rent'],
        //     ['name' => 'Savings'],
        //     ['name' => 'Investments'],
        //     ['name' => 'Other'],
        // ];

        // foreach ($categories as $category) {
        //     Category::updateOrCreate(['name' => $category['name']], $category);
        // }

        // $categories = Category::all();


    }
}
