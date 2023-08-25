<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory(10)->years()->create();
        Comment::factory(10)->months()->create();
        Comment::factory(10)->days()->create();
        Comment::factory(10)->hours()->create();
        Comment::factory(10)->minutes()->create();
        Comment::factory(10)->create();
    }
}
