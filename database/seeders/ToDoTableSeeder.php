<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ToDo;

class ToDoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            ToDo::create([
                'title' => 'タイトル' . $i,
                'content' =>'内容' . $i,
                'state' => 1
            ]);
        }
    }
}
