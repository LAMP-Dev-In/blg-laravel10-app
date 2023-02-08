<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

         $user = User::factory()->create();

        $personal =  Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
         ]);

         $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
         ]);

         $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
         ]);

         Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-family-post',
            'excerpt' => 'Excerpt for my family post',
            'body' => "<p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in turpis varius, semper justo in, pulvinar purus. Quisque malesuada ullamcorper libero, placerat posuere nibh sodales id. Mauris vel ligula bibendum, porttitor elit nec, vehicula tellus. Pellentesque tincidunt lectus id purus eleifend sollicitudin. Nam venenatis pretium turpis, quis tempor lectus. Quisque auctor mauris at lectus blandit, in vulputate mi blandit. Nam molestie neque lacus, id commodo mi euismod in. Aenean nisi elit, ultricies et vestibulum eget, tristique id arcu. Mauris euismod bibendum purus ac semper. Quisque eu varius lectus, sed volutpat risus. Nunc gravida accumsan enim nec scelerisque. Integer a tempor dolor. 
                      </p>",
         ]);

         Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => 'Excerpt for my work post',
            'body' => "<p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in turpis varius, semper justo in, pulvinar purus. Quisque malesuada ullamcorper libero, placerat posuere nibh sodales id. Mauris vel ligula bibendum, porttitor elit nec, vehicula tellus. Pellentesque tincidunt lectus id purus eleifend sollicitudin. Nam venenatis pretium turpis, quis tempor lectus. Quisque auctor mauris at lectus blandit, in vulputate mi blandit. Nam molestie neque lacus, id commodo mi euismod in. Aenean nisi elit, ultricies et vestibulum eget, tristique id arcu. Mauris euismod bibendum purus ac semper. Quisque eu varius lectus, sed volutpat risus. Nunc gravida accumsan enim nec scelerisque. Integer a tempor dolor. 
                      </p>",
         ]);

         Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My Personal Post',
            'slug' => 'my-personal-post',
            'excerpt' => 'Excerpt for my personal post',
            'body' => "<p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in turpis varius, semper justo in, pulvinar purus. Quisque malesuada ullamcorper libero, placerat posuere nibh sodales id. Mauris vel ligula bibendum, porttitor elit nec, vehicula tellus. Pellentesque tincidunt lectus id purus eleifend sollicitudin. Nam venenatis pretium turpis, quis tempor lectus. Quisque auctor mauris at lectus blandit, in vulputate mi blandit. Nam molestie neque lacus, id commodo mi euismod in. Aenean nisi elit, ultricies et vestibulum eget, tristique id arcu. Mauris euismod bibendum purus ac semper. Quisque eu varius lectus, sed volutpat risus. Nunc gravida accumsan enim nec scelerisque. Integer a tempor dolor. 
                      </p>",
         ]);
        
    }
}
