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
            ['name'=>'Kem Đánh Răng Crest 3D White Fluoride Anticavity Toothpaste Arctic Fresh','description'=>'Description 1','retired'=>'0','status'=>'1','price'=>'145000','discount'=>'10']
            ,['name'=>'Nước Súc Miệng Listerine Cool Mint Mouthwash','description'=>'Description 2','retired'=>'0','status'=>'1','price'=>'85000','discount'=>'11']
            ,['name'=>'Sữa Dưỡng Thể Trắng Da Tức Thì Vaseline Instant Fair','description'=>'Description 3','retired'=>'0','status'=>'1','price'=>'72000','discount'=>'12']
            ,['name'=>'Nivea Sữa Dưỡng thể Nivea Extra White C&E Vitamin Lotion Dưỡng trắng & Tăng Đàn Hồi da','description'=>'Description 4','retired'=>'0','status'=>'1','price'=>'116000','discount'=>'13']
            ,['name'=>'Sữa Chống Nắng Cực Mạnh Sunplay Super Block SPF81/PA++++','description'=>'Description 5','retired'=>'0','status'=>'1','price'=>'149000','discount'=>'14']
        ]);
    }
}
