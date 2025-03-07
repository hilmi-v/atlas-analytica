<?php

namespace Database\Seeders;

use App\Models\Book;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Review;
use App\Models\Category;
use App\Models\CategoryBook;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);


        for ($i = 0; $i < 10; $i++) {
            Category::create([
                'name' => "category {$i}",
                'slug' => "category-{$i}"
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            Book::create([
                'title' => "book {$i}",
                'slug' => "book-{$i}",
                'author' => "author {$i}",
                'language' => "Indonesia",
                'published_at' => now()->year,
                'published_by' => "publisher {$i}",
                'description' => "   Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio voluptas ipsam in ex dicta quod expedita quasi rem quae distinctio molestias, recusandae dolorum nihil corrupti alias praesentium eveniet! Magni quod dignissimos illo? Assumenda nemo nulla dicta voluptas impedit dolor hic iure, deleniti, eligendi tenetur animi provident autem nam tempora incidunt dolore! Tempora, deserunt est, fugit quis quo repudiandae commodi natus deleniti accusamus doloremque placeat excepturi officia quasi error expedita nihil beatae minus in qui aut facere atque! Est sit exercitationem officia magni praesentium cumque architecto asperiores natus? Aliquam, fugit ducimus? Iure, magni reiciendis iusto natus explicabo sapiente quibusdam quidem illo.",
                'pages' => rand(50, 500),
                'cover' => 'images/test.jpg'
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            CategoryBook::create([
                'category_id' => rand(1, 10),
                'book_id' => rand(1, 10)
            ]);
        }
        Review::create([
            'book_id' => 1,
            'user_id' => 1,
            'review' => 'just ok book!',
            'rating' => 40,
        ]);

        Review::create([
            'book_id' => 2,
            'user_id' => 1,
            'review' => 'Nice read!',
            'rating' => 90,
        ]);
    }
}
