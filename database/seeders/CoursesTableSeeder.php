<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('courses')->truncate();

        DB::table('courses')->insert([
            [
                'judul' => 'Pengenalan ke Laravel',
                'deskripsi' => 'Pelajari dasar-dasar framework Laravel.',
                'durasi' => 120
            ],
            [
                'judul' => 'Teknik Laravel Lanjutan',
                'deskripsi' => 'Jelajahi fitur dan teknik lanjutan di Laravel.',
                'durasi' => 180
            ],
            [
                'judul' => 'Menguasai Vue.js',
                'deskripsi' => 'Menjadi mahir dalam Vue.js untuk membangun aplikasi web modern.',
                'durasi' => 150
            ]
        ]);
    }
}
