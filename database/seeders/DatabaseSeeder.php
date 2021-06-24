<?php

namespace Database\Seeders;

use App\Models\user;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(userSeeder::class);
        $this->call(brandSeeder::class);
        $this->call(categorySeeder::class);
        $this->call(productSeeder::class);
    }
}

class userSeeder extends Seeder
{
    public function run()
    {
        DB::table('user')->insert([
            ['type'=>'0','fname'=>'Admin','lname'=>'admin','email'=>'admin1@gmail.com','password'=>Hash::make('Admin12345'),'address'=>'HCM','username' => 'adminhihi'],
            ['type'=>'1','fname'=>'Someone','lname'=>'else','email'=>'someone@gmail.com','password'=>Hash::make('User12345'),'address'=>'HCM','username' => 'someoneelse'],
        ]);
    }
}

class brandSeeder extends Seeder
{
    public function run()
    {
        DB::table('brand')->insert([
            ["name" => "Banana Boat", "slogan" => "Protect The Fun", "logo" => "logo 1"],
            ["name" => "paula's choice", "slogan" => "Beauty Begins With Truth", "logo" => "logo 2"],
            ["name" => "la roche posay", "slogan" => "LA ROCHE-POSAY. COMMITTED TO DERMATOLOGY.", "logo" => "logo 3"],
            ["name" => "VICHY", "slogan" => "HEALHT IS BEAUTIFUL", "logo" => "logo 4"],
            ["name" => "Victoria Secret", "slogan" => "It's All About You - Sexy. Chic.Powerful", "logo" => "logo 5"],
            ["name" => "Biorderma", "slogan" => "Luôn hành động vì một làn da khỏe đẹp", "logo" => "logo 6"],
            ["name" => "Bioré ", "slogan" => "Free yourr pores", "logo" => "logo 7"],
            ["name" => "Sunplay", "slogan" => "Da không sợ nắng", "logo" => "logo 8"],
            ["name" => "Banana Boat", "slogan" => "Protect The Fun", "logo" => "logo 9"],
            ["name" => "paula's choice", "slogan" => "Beauty Begins With Truth", "logo" => "logo 10"],
            ["name" => "la roche posay", "slogan" => "LA ROCHE-POSAY. COMMITTED TO DERMATOLOGY.", "logo" => "logo 11"],
            ["name" => "VICHY", "slogan" => "HEALHT IS BEAUTIFUL", "logo" => "logo 12"],
            ["name" => "The Face shop", "slogan" => "Natural Story", "logo" => "logo 13"],
            ["name" => "Innisfree", "slogan" => "Play green", "logo" => "logo 14"],
            ["name" => "Maybelline New York", "slogan" => "Maybe she’s born with it. maybe it’s Maybelline", "logo" => "logo 15"],
            ["name" => "Lancôme", "slogan" => "", "logo" => "logo 16"],
            ["name" => "Chanel", "slogan" => "The legend and the life", "logo" => "logo 17"],
            ["name" => "Laneige", "slogan" => "Luminous Beauty", "logo" => "logo 18"],
            ["name" => "Bourjois ", "slogan" => "Let's play Beauty", "logo" => "logo 19"],
            ["name" => "L'Oréal", "slogan" => "Because you're worth it", "logo" => "logo 20"]
        ]);
    }
}

class categorySeeder extends Seeder
{
    public function run()
    {
        DB::table('category')->insert([
            ["name" => "LIP STICK", "description" => "Lip makeup in liquid form"],
            ["name" => "LIP LACQUER", "description" => "Lip makeup in solid form"],
            ["name" => "LIP MASK", "description" => "Lip balm supplement"],
            ["name" => "LIP BAML", "description" => "Lip balm supplement"],
            ["name" => "BODY LOTION", "description" => "Add moisture to the skin"],
            ["name" => "MAKE UP REMOVING", "description" => "Protect your skin under the sun"],
            ["name" => "SUNSCREEN", "description" => "Body cleansing"],
            ["name" => "SHOWER GEL", "description" => "Hair cleasing"],
            ["name" => "SHAMPOO", "description" => "Hair treatment"],
            ["name" => "CONDITIONER", "description" => "Remove hair"],
            ["name" => "WAX", "description" => "Cover face "],
            ["name" => "FOUNDATION", "description" => "Cover face "],
            ["name" => "CUSHION", "description" => "Blemish & Balm cream"],
            ["name" => "BB CREAM", "description" => ""],
            ["name" => "CONCEALER", "description" => ""],
            ["name" => "HIGHLIGHTER", "description" => ""],
            ["name" => "PRIMER", "description" => ""],
            ["name" => "POWDER ", "description" => ""],
            ["name" => "PACT", "description" => ""],
            ["name" => "BLUSH", "description" => ""],
            ["name" => "EYE LINER", "description" => ""],
            ["name" => "MASCARA", "description" => ""],
            ["name" => "EYESHADOW", "description" => ""],
            ["name" => "EYE BROWN", "description" => ""]

        ]);
    }
}


class productSeeder extends Seeder
{
    public function run()
    {
        DB::table('product')->insert([
            ["name" => "VASELINE Body Lotion Healthy White UV Lightening", "category_id" => "5", "brand_id" => "1", "description" => "Description 1", "status" => "1", "price" => "140", "discount" => "10", "quantity" => "2", "tax" => "10", "feature" => "feature 1", "mark" => "1"],
            ["name" => "Bioderma - Sensibio H2O - Micellar Water - Cleansing and Make-Up Removing - Refreshing Feeling - for Sensitive Skin", "category_id" => "6", "brand_id" => "6", "description" => "Description 2", "status" => "1", "price" => "450", "discount" => "11", "quantity" => "6", "tax" => "25", "feature" => "feature 2", "mark" => "2"],
            ["name" => "Sunplay Skin Aqua Tone Up UV Essence", "category_id" => "7", "brand_id" => "8", "description" => "Description 3", "status" => "1", "price" => "140", "discount" => "12", "quantity" => "1", "tax" => "0", "feature" => "feature 3", "mark" => "3"],
            ["name" => "superstay 24h full coverage foundation", "category_id" => "12", "brand_id" => "15", "description" => "Description 4", "status" => "1", "price" => "173", "discount" => "13", "quantity" => "2", "tax" => "0", "feature" => "feature 4", "mark" => "4"],
            ["name" => "The Face Shop Ink Gel Slim Pencil Eyeliner", "category_id" => "9", "brand_id" => "13", "description" => "Description 5", "status" => "1", "price" => "140", "discount" => "14", "quantity" => "2", "tax" => "0", "feature" => "feature 5", "mark" => "5"],
            ["name" => "Makeup Voluminous Lash Paradise Waterproof Mascara", "category_id" => "22", "brand_id" => "20", "description" => "Description 6", "status" => "1", "price" => "156", "discount" => "20", "quantity" => "4", "tax" => "0", "feature" => "feature 6", "mark" => "6"],
            ["name" => "Neo Cushion Glow #23N", "category_id" => "13", "brand_id" => "18", "description" => "Description 7", "status" => "1", "price" => "808", "discount" => "0", "quantity" => "5", "tax" => "0", "feature" => "feature 7", "mark" => "7"],
            ["name" => "L'absolu Rouge Cream Lipstick - 132 Caprice", "category_id" => "1", "brand_id" => "16", "description" => "Description 8", "status" => "1", "price" => "900", "discount" => "0", "quantity" => "6", "tax" => "0", "feature" => "feature 8", "mark" => "8"]
        ]);
    }
}
