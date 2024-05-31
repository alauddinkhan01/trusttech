<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Lifestyle',
            'Fashion & Beauty',
            'Travel',
            'Food & Cooking',
            'Fitness & Health',
            'Personal Development & Self-Help',
            'Parenting & Family',
            'Technology & Gadgets',
            'Finance & Investing',
            'Business & Entrepreneurship',
            'Education & Learning',
            'Arts & Crafts',
            'Books & Literature',
            'Environment & Sustainability',
            'Politics & Social Issues',
            'Entertainment & Pop Culture',
            'Science & Technology',
            'Relationships & Dating',
            'Humor & Satire',
            'Spirituality & Religion',
        ];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
