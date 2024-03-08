<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create(['category_name' => 'Horror']);
        Category::create(['category_name' => 'Comedy']);
        Category::create(['category_name' => 'Science Fiction']);
        Author::create(['author_name' => 'John Doe']);
        Author::create(['author_name' => 'Jane Smith']);
        Author::create(['author_name' => 'Michael John']);
    }
}
