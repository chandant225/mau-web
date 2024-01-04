<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog = Category::create([
            'name' => 'blog',
            'slug' => 'blog',
            'description' => 'Blogs of any types like news and updates, notices, etc.',
        ]);

        Category::create([
            'name' => 'news & update',
            'slug' => 'news-update',
            'description' => 'Latest news and updates.',
            'parent_id' => $blog->id,
        ]);

        Category::create([
            'name' => 'notices',
            'slug' => 'notices',
            'description' => 'Tilganga notices.',
            'parent_id' => $blog->id,
        ]);

        Category::create([
            'name' => 'publications',
            'slug' => 'publications',
            'description' => 'Tilganga publications.',
            'parent_id' => $blog->id,
        ]);

        $services = Category::create([
            'name' => 'services',
            'slug' => 'services',
            'description' => 'All services for TIO.',
        ]);

        $deparment = Category::create([
            'name' => 'departments',
            'slug' => 'departments',
            'description' => 'Deparments of TIO.',
        ]);

        $branches = Category::create([
            'name' => 'our networks',
            'slug' => 'our-networks',
            'description' => 'Branches of TIO.',
        ]);

        $who = Category::create([
            'name' => 'who',
            'slug' => 'who',
            'description' => 'Who Collaborating centers of TIO.',
        ]);

    }
}