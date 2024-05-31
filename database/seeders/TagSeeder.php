<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            '#Travel',
            '#Food',
            '#Fitness',
            '#Health',
            '#Lifestyle',
            '#Technology',
            '#Finance',
            '#Education',
            '#Parenting',
            '#Fashion',
            '#Beauty',
            '#DIY',
            '#Recipes',
            '#Wellness',
            '#Motivation',
            '#Productivity',
            '#Business',
            '#Entrepreneurship',
            '#Books',
            '#Art',
            '#Photography',
            '#EcoFriendly',
            '#Sustainability',
            '#Politics',
            '#SocialJustice',
            '#Entertainment',
            '#Movies',
            '#Music',
            '#Science',
            '#Relationships',
            '#Dating',
            '#Humor',
            '#Mindfulness',
            '#Spirituality',
        ];
        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
