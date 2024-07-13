<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Review;
use App\Models\ReviewImage;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    
        User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'admin'
        ]);

        $categories = ['Mobile', 'TV', 'Audio', 'Home Appliances'];
        
        foreach ($categories as $category) {
            Category::create([
                "name" => $category,
            ]);
        }

        Category::all()->each(function(Category $category){
            Product::factory()->count(rand(1,10))->create([
                'category_id' => $category->id
            ]);
        });

        Product::all()->each(function(Product $p){

            Review::factory()->count(rand(0,10))->create([
                'product_id' => $p->id,
                'user_id' => rand(1,10)
            ]);

            ProductImage::factory()->count(rand(0,4))->create([
                'product_id' => $p->id,
            ]);
        });

        Review::all()->each(function(Review $r){
           
            ReviewImage::factory()->count(rand(0,2))->create([
                'review_id' => $r->id,
            ]);
        });

    }
}
