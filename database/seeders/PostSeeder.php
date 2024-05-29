<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'title'=>'Judul Artikel 1',
            'author'=>'Dyah',
            'slug'=>'judul-artikel-1',
            'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio fugit fugiat blanditiis sed ullam minima. 
            Perferendis eos officiis provident quidem vero assumenda debitis omnis? Ea, ullam omnis. Excepturi, eaque obcaecati.',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'title'=>'Judul Artikel 2',
            'author'=>'Dyah',
            'slug'=>'judul-artikel-2',
            'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio fugit fugiat blanditiis sed ullam minima. 
            Perferendis eos officiis provident quidem vero assumenda debitis omnis? Ea, ullam omnis. Excepturi, eaque obcaecati.',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
