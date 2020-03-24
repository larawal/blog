<?php

use Illuminate\Database\Seeder;
use App\Models\Articles;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Articles::class, 50)->create();
    }
}
