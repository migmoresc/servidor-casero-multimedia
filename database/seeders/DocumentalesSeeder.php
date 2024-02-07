<?php

namespace Database\Seeders;

use App\Models\Documental;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Documental::factory()->count(5)->create();
    }
}
