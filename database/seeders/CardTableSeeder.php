<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Card;

class CardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Card::create([
            'question' => 'Question number 1?',
            'answer' => 'Answer number 1',
            'hint' => '',
            'folder_id' => 1,
        ]);
    }
}
