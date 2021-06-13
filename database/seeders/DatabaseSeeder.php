<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(productSeeder::class);
    }
}

class productSeeder extends Seeder {
    public function run()
    {
        DB::table('product')->insert([
            ['NAME'=>'Kem Đánh Răng Crest 3D White Fluoride Anticavity Toothpaste Arctic Fresh','DESCRIPTION'=>'Description 1','RETIRED'=>'0','STATUS'=>'1','PRICE'=>'145000','SALE'=>'10']
            ,['NAME'=>'Nước Súc Miệng Listerine Cool Mint Mouthwash','DESCRIPTION'=>'Description 2','RETIRED'=>'0','STATUS'=>'1','PRICE'=>'85000','SALE'=>'11']
            ,['NAME'=>'Sữa Dưỡng Thể Trắng Da Tức Thì Vaseline Instant Fair','DESCRIPTION'=>'Description 3','RETIRED'=>'0','STATUS'=>'1','PRICE'=>'72000','SALE'=>'12']
            ,['NAME'=>'Nivea Sữa Dưỡng thể Nivea Extra White C&E Vitamin Lotion Dưỡng trắng & Tăng Đàn Hồi da','DESCRIPTION'=>'Description 4','RETIRED'=>'0','STATUS'=>'1','PRICE'=>'116000','SALE'=>'13']
            ,['NAME'=>'Sữa Chống Nắng Cực Mạnh Sunplay Super Block SPF81/PA++++','DESCRIPTION'=>'Description 5','RETIRED'=>'0','STATUS'=>'1','PRICE'=>'149000','SALE'=>'14']
        ]);
    }
}
