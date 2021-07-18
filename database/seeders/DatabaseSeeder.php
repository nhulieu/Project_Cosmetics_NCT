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
        $this->call(tagSeeder::class);
        $this->call(brandSeeder::class);
        $this->call(categorySeeder::class);
        $this->call(productSeeder::class);
        $this->call(imageSeeder::class);
        $this->call(userSeeder::class);
        $this->call(reviewSeeder::class);
    }
}

class couponSeeder extends Seeder{
    public function run(){
      DB::table('coupon')->insert([
          ["brand_id"=>"1","name"=>"VASELINE", "code"=>"VASELINE10", "description"=>"discount Vaseline product ", "start_date"=>"2021-01-01", "end_date"=>"2021-12-31"],
          ["brand_id"=>"2","name"=>"Bath and body work", "code"=>"BBW10", "description"=>"discount BB&W product ", "start_date"=>"2021-01-01", "end_date"=>"2021-12-31"],
          ["brand_id"=>"3","name"=>"Hatomugi", "code"=>"HATO10", "description"=>"discount Hatomugi product ", "start_date"=>"2021-01-01", "end_date"=>"2021-12-31"],
          ["brand_id"=>"4","name"=>"Nivea", "code"=>"NIVEA10", "description"=>"discount NIVEA product ", "start_date"=>"2021-01-01", "end_date"=>"2021-12-31"],
       ]);
    }
}

class brandSeeder extends Seeder
{
    public function run()
    {
        DB::table('brand')->insert([
            ["name"=>"VASELINE","slogan"=>"There's full tub of it somewhere in your house","logo"=>"img/brand_logo/vaseline.png"]	,
            ["name"=>"Bath and body work","slogan"=>"","logo"=>"img/brand_logo/BBW_logo.png"]	,
            ["name"=>"Hatomugi","slogan"=>"","logo"=>"img/brand_logo/Hatomugi.png"]	,
            ["name"=>"Nivea","slogan"=>"Life is well","logo"=>"img/brand_logo/nivea_logo.png"]	,
            ["name"=>"Victoria Secret","slogan"=>"It's All About You - Sexy. Chic.Powerful","logo"=>"img/brand_logo/Victoria_secret4.png"]	,
            ["name"=>"Biorderma","slogan"=>"Luôn hành động vì một làn da khỏe đẹp","logo"=>"img/brand_logo/bioderma.jpg"]	,
            ["name"=>"Bioré ","slogan"=>"Free yourr pores","logo"=>"img/brand_logo/Bioré_logo_logotype.png"]	,
            ["name"=>"Sunplay","slogan"=>"Da không sợ nắng","logo"=>"img/brand_logo/sunplay.png"]	,
            ["name"=>"Banana Boat","slogan"=>"Protect The Fun","logo"=>"img/brand_logo/banana.png"]	,
            ["name"=>"paula's choice","slogan"=>"Beauty Begins With Truth","logo"=>"img/brand_logo/paulaschoicelogo.jpg"]	,
            ["name"=>"la roche posay","slogan"=>"LA ROCHE-POSAY. COMMITTED TO DERMATOLOGY.","logo"=>"img/brand_logo/la_roche_posay.jpg"]	,
            ["name"=>"VICHY","slogan"=>"HEALHT IS BEAUTIFUL","logo"=>"img/brand_logo/Vichy.png"]	,
            ["name"=>"The Face shop","slogan"=>"Natural Story","logo"=>"img/brand_logo/THEFACESHOP-LOGO.png"]	,
            ["name"=>"Innisfree","slogan"=>"Play green","logo"=>"img/brand_logo/logo-Innisfree.jpg"]	,
            ["name"=>"Maybelline New York","slogan"=>"Maybe she’s born with it. maybe it’s Maybelline","logo"=>"img/brand_logo/maybelline-logo-2.jpg"]	,
            ["name"=>"Lancôme","slogan"=>"","logo"=>"img/brand_logo/Lancome_logo.png"]	,
            ["name"=>"Chanel","slogan"=>"The legend and the life","logo"=>"img/brand_logo/chanel_logo.png"]	,
            ["name"=>"Laneige","slogan"=>"Luminous Beauty","logo"=>"img/brand_logo/laneige_logo.jpg"]	,
            ["name"=>"Bourjois ","slogan"=>"Let's play Beauty","logo"=>"img/brand_logo/Bourjois.jpg"]	,
            ["name"=>"L'Oréal","slogan"=>"Because you're worth it","logo"=>"img/brand_logo/L'oreal.jpg"]	,
            ["name"=>"Morrocano Oil","slogan"=>"","logo"=>"img/brand_logo/MorrocanoOil.png"]	,
            ["name"=>"Senka","slogan"=>"","logo"=>"img/brand_logo/senka_logo.jpg"]
        ]);
    }
}
class userSeeder extends Seeder
{
    public function run()
    {
        DB::table('user')->insert([
            ["fname"=>"Cang","lname"=>"Trinh Van","email"=>"trinhvancang92@gmail.com","username"=>"cangtring","password"=>"123","address"=>"123 Nguyen Trai","phone"=>"0962382911", "type"=>"1"],
            ["fname"=>"Tai","lname"=>"Ngo","email"=>"taingo@gmail.com","username"=>"taingo","password"=>"123","address"=>"456 Nguyen Trai","phone"=>"0988777999", "type"=>"2"],
            ["fname"=>"Nhu","lname"=>"Lieu Quynh","email"=>"lieunhu@gmail.com","username"=>"lieunhu","password"=>"123","address"=>"789 Nguyen Trai","phone"=>"0999888666", "type"=>"2"],
        ]);
    }
}
class reviewSeeder extends Seeder
{
    public function run()
    {
        DB::table('review')->insert([
            ["mark"=>"5","content"=>"I love to buy all stuff in NCT's website because it is pretty easily for us to buy and pay.","user_id"=>"1","product_id"=>"1"],
            ["mark"=>"5","content"=>"I cannot believe that I am a royal member of this e-commercial website and enjoy all products here.","user_id"=>"2","product_id"=>"2"],
            ["mark"=>"5","content"=>"I must confess that I drop this website twice a week and choose the most sale price without worrying about quality.","user_id"=>"3","product_id"=>"3"],
        ]);
    }
}

class imageSeeder extends Seeder
{
    public function run()
    {
        DB::table('image')->insert([
            ["product_id" => "1", "path" => "img/Product_Photo/1. Vaseline/1.jpg"],
            ["product_id" => "1", "path" => "img/Product_Photo/1. Vaseline/2.jpg"],
            ["product_id" => "1", "path" => "img/Product_Photo/1. Vaseline/3.jpg"],
            ["product_id" => "1", "path" => "img/Product_Photo/1. Vaseline/4.jpg"],
            ["product_id" => "1", "path" => "img/Product_Photo/1. Vaseline/5.jpg"],
            ["product_id" => "1", "path" => "img/Product_Photo/1. Vaseline/6.jpg"],

            ["product_id" => "2", "path" => "img/Product_Photo/2. Bioderma/1.jpg"],
            ["product_id" => "2", "path" => "img/Product_Photo/2. Bioderma/2.jpg"],
            ["product_id" => "2", "path" => "img/Product_Photo/2. Bioderma/3.jpg"],

            ["product_id" => "3", "path" => "img/Product_Photo/3. Sunplay/1.jpg"],
            ["product_id" => "3", "path" => "img/Product_Photo/3. Sunplay/2.jpg"],
            ["product_id" => "3", "path" => "img/Product_Photo/3. Sunplay/3.jpg"],
            ["product_id" => "3", "path" => "img/Product_Photo/3. Sunplay/4.jpg"],

            ["product_id" => "4", "path" => "img/Product_Photo/4. Maybelline/1.jpg"],
            ["product_id" => "4", "path" => "img/Product_Photo/4. Maybelline/2.jpg"],
            ["product_id" => "4", "path" => "img/Product_Photo/4. Maybelline/3.jpg"],
            ["product_id" => "4", "path" => "img/Product_Photo/4. Maybelline/4.jpg"],
            ["product_id" => "4", "path" => "img/Product_Photo/4. Maybelline/5.jpg"],

            ["product_id" => "5", "path" => "img/Product_Photo/5. The face shop/1.jpg"],
            ["product_id" => "5", "path" => "img/Product_Photo/5. The face shop/2.jpg"],
            ["product_id" => "5", "path" => "img/Product_Photo/5. The face shop/3.jpg"],

            ["product_id" => "6", "path" => "img/Product_Photo/6. Makeup Voluminous Lash Paradise Waterproof Mascara/1.jpg"],
            ["product_id" => "6", "path" => "img/Product_Photo/6. Makeup Voluminous Lash Paradise Waterproof Mascara/2.jpg"],
            ["product_id" => "6", "path" => "img/Product_Photo/6. Makeup Voluminous Lash Paradise Waterproof Mascara/3.jpg"],

            ["product_id" => "7", "path" => "img/Product_Photo/7. Neo Cushion Glow 23N/1.jpg"],
            ["product_id" => "7", "path" => "img/Product_Photo/7. Neo Cushion Glow 23N/2.jpg"],
            ["product_id" => "7", "path" => "img/Product_Photo/7. Neo Cushion Glow 23N/3.jpg"],
            ["product_id" => "7", "path" => "img/Product_Photo/7. Neo Cushion Glow 23N/4.jpg"],

            ["product_id" => "8", "path" => "img/Product_Photo/8. L'absolu/1.jpg"],
            ["product_id" => "8", "path" => "img/Product_Photo/8. L'absolu/2.jpg"],
            ["product_id" => "8", "path" => "img/Product_Photo/8. L'absolu/3.jpg"],
            ["product_id" => "8", "path" => "img/Product_Photo/8. L'absolu/4.jpg"],

            ["product_id" => "9", "path" => "img/Product_Photo/9. EFFACLAR/1.jpg"],
            ["product_id" => "9", "path" => "img/Product_Photo/9. EFFACLAR/2.jpg"],
            ["product_id" => "9", "path" => "img/Product_Photo/9. EFFACLAR/3.jpg"],
            ["product_id" => "9", "path" => "img/Product_Photo/9. EFFACLAR/4.jpg"],

            ["product_id" => "10", "path" => "img/Product_Photo/10. L'Oreal/1.jpg"],
            ["product_id" => "10", "path" => "img/Product_Photo/10. L'Oreal/2.jpg"],
            ["product_id" => "10", "path" => "img/Product_Photo/10. L'Oreal/3.jpg"],

            ["product_id" => "11", "path" => "img/Product_Photo/11. Innisfree/1.jpg"],
            ["product_id" => "11", "path" => "img/Product_Photo/11. Innisfree/2.jpg"],
            ["product_id" => "11", "path" => "img/Product_Photo/11. Innisfree/3.jpg"],

            ["product_id" => "12", "path" => "img/Product_Photo/12. Hatomugi/1.jpg"],
            ["product_id" => "12", "path" => "img/Product_Photo/12. Hatomugi/2.jpg"],
            ["product_id" => "12", "path" => "img/Product_Photo/12. Hatomugi/3.jpg"],
            ["product_id" => "12", "path" => "img/Product_Photo/12. Hatomugi/4.jpg"],

            ["product_id" => "13", "path" => "img/Product_Photo/13. VITALUMIÈRE/1.jpg"],
            ["product_id" => "13", "path" => "img/Product_Photo/13. VITALUMIÈRE/2.jpg"],
            ["product_id" => "13", "path" => "img/Product_Photo/13. VITALUMIÈRE/3.jpg"],
            ["product_id" => "13", "path" => "img/Product_Photo/13. VITALUMIÈRE/4.jpg"],

            ["product_id" => "14", "path" => "img/Product_Photo/14. Nivea Lip/1.jpg"],
            ["product_id" => "14", "path" => "img/Product_Photo/14. Nivea Lip/2.jpg"],
            ["product_id" => "14", "path" => "img/Product_Photo/14. Nivea Lip/3.jpg"],

            ["product_id" => "15", "path" => "img/Product_Photo/15. Vichy Aqualia/1.jpg"],
            ["product_id" => "15", "path" => "img/Product_Photo/15. Vichy Aqualia/2.jpg"],
            ["product_id" => "15", "path" => "img/Product_Photo/15. Vichy Aqualia/3.jpg"],

            ["product_id" => "16", "path" => "img/Product_Photo/16. Biore/1.jpg"],
            ["product_id" => "16", "path" => "img/Product_Photo/16. Biore/1.jpg"],
            ["product_id" => "16", "path" => "img/Product_Photo/16. Biore/1.jpg"],

            ["product_id" => "17", "path" => "img/Product_Photo/17. SENKA/1.jpg"],
            ["product_id" => "17", "path" => "img/Product_Photo/17. SENKA/2.jpg"],
            ["product_id" => "17", "path" => "img/Product_Photo/17. SENKA/3.jpg"],
            ["product_id" => "17", "path" => "img/Product_Photo/17. SENKA/4.jpg"],
            ["product_id" => "17", "path" => "img/Product_Photo/17. SENKA/5.jpg"],
            ["product_id" => "17", "path" => "img/Product_Photo/17. SENKA/6.jpg"],

            ["product_id" => "18", "path" => "img/Product_Photo/18. Bourjois/1.jpg"],
            ["product_id" => "18", "path" => "img/Product_Photo/18. Bourjois/2.jpg"],
            ["product_id" => "18", "path" => "img/Product_Photo/18. Bourjois/3.jpg"],

            ["product_id" => "19", "path" => "img/Product_Photo/19. Paula's Choice/1.jpg"],
            ["product_id" => "19", "path" => "img/Product_Photo/19. Paula's Choice/2.jpg"],
            ["product_id" => "19", "path" => "img/Product_Photo/19. Paula's Choice/3.jpg"],

            ["product_id" => "20", "path" => "img/Product_Photo/20. Moroccanoil/1.jpg"],
            ["product_id" => "20", "path" => "img/Product_Photo/20. Moroccanoil/2.jpg"],
            ["product_id" => "20", "path" => "img/Product_Photo/20. Moroccanoil/3.jpg"],

            ["product_id" => "21", "path" => "img/Product_Photo/21. Maybelline Baby Skin Makeup Primer 22ml/1.png"],
            ["product_id" => "21", "path" => "img/Product_Photo/21. Maybelline Baby Skin Makeup Primer 22ml/2.jpg"],
            ["product_id" => "21", "path" => "img/Product_Photo/21. Maybelline Baby Skin Makeup Primer 22ml/3.jpg"],

            ["product_id" => "22", "path" => "img/Product_Photo/22. L'Oréal Paris Color Conditioner 165ml/1.jpeg"],
            ["product_id" => "22", "path" => "img/Product_Photo/22. L'Oréal Paris Color Conditioner 165ml/2.jpg"],
            ["product_id" => "22", "path" => "img/Product_Photo/22. L'Oréal Paris Color Conditioner 165ml/3.png"],

            ["product_id" => "23", "path" => "img/Product_Photo/23. Paula's Choice 5% AHA Exfoliating Scrub For Normal Dry Skin 50ml/1.jpg"],
            ["product_id" => "23", "path" => "img/Product_Photo/23. Paula's Choice 5% AHA Exfoliating Scrub For Normal Dry Skin 50ml/2.jpg"],
            ["product_id" => "23", "path" => "img/Product_Photo/23. Paula's Choice 5% AHA Exfoliating Scrub For Normal Dry Skin 50ml/3.jpg"],

            ["product_id" => "24", "path" => "img/Product_Photo/24. Lancôme Youthful & Radiant Skin Care 7ml/1.jpg"],
            ["product_id" => "24", "path" => "img/Product_Photo/24. Lancôme Youthful & Radiant Skin Care 7ml/2.jpg"],
            ["product_id" => "24", "path" => "img/Product_Photo/24. Lancôme Youthful & Radiant Skin Care 7ml/3.jpg"],

            ["product_id" => "25", "path" => "img/Product_Photo/25. Banana Boat Ultra Protect Sports Sunscreen SPF110 (90ml)/1.jpg"],
            ["product_id" => "25", "path" => "img/Product_Photo/25. Banana Boat Ultra Protect Sports Sunscreen SPF110 (90ml)/2.jpg"],
            ["product_id" => "25", "path" => "img/Product_Photo/25. Banana Boat Ultra Protect Sports Sunscreen SPF110 (90ml)/3.jpg"],

            ["product_id" => "26", "path" => "img/Product_Photo/26. Bath&Body Works Japanese Cherry Blossom Shower Gel/1.jpg"],
            ["product_id" => "26", "path" => "img/Product_Photo/26. Bath&Body Works Japanese Cherry Blossom Shower Gel/2.jpg"],
            ["product_id" => "26", "path" => "img/Product_Photo/26. Bath&Body Works Japanese Cherry Blossom Shower Gel/3.jpg"],

            ["product_id" => "27", "path" => "img/Product_Photo/27. Bath & Body Works Black Raspberry Vanilla Shower Gel 295ml/1.jpg"],
            ["product_id" => "27", "path" => "img/Product_Photo/27. Bath & Body Works Black Raspberry Vanilla Shower Gel 295ml/2.jpg"],
            ["product_id" => "27", "path" => "img/Product_Photo/27. Bath & Body Works Black Raspberry Vanilla Shower Gel 295ml/3.jpg"],

            ["product_id" => "28", "path" => "img/Product_Photo/51. Bath & Body Works Body Lotion Moonlight Path 236ml/1.jpg"],
            ["product_id" => "28", "path" => "img/Product_Photo/51. Bath & Body Works Body Lotion Moonlight Path 236ml/2.jpg"],
            ["product_id" => "28", "path" => "img/Product_Photo/51. Bath & Body Works Body Lotion Moonlight Path 236ml/3.jpg"],

            ["product_id" => "29", "path" => "img/Product_Photo/28. VICTORIA'S SECRET Amber Romance shower gel 250ml/1.jpg"],
            ["product_id" => "29", "path" => "img/Product_Photo/28. VICTORIA'S SECRET Amber Romance shower gel 250ml/2.jpg"],
            ["product_id" => "29", "path" => "img/Product_Photo/28. VICTORIA'S SECRET Amber Romance shower gel 250ml/3.jpg"],

            ["product_id" => "30", "path" => "img/Product_Photo/29. Senka Pink Brightening Facial Mask 25ml/1.jpg"],
            ["product_id" => "30", "path" => "img/Product_Photo/29. Senka Pink Brightening Facial Mask 25ml/2.jpeg"],
            ["product_id" => "30", "path" => "img/Product_Photo/29. Senka Pink Brightening Facial Mask 25ml/3.jpg"],

            ["product_id" => "31", "path" => "img/Product_Photo/30. Victoria's Secret Very Sexy Body Lotion 100ml/1.png"],
            ["product_id" => "31", "path" => "img/Product_Photo/30. Victoria's Secret Very Sexy Body Lotion 100ml/2.jpg"],
            ["product_id" => "31", "path" => "img/Product_Photo/30. Victoria's Secret Very Sexy Body Lotion 100ml/3.jpg"],

            ["product_id" => "32", "path" => "img/Product_Photo/31. Innisfree Bright Solution Mask 22ml/1.png"],
            ["product_id" => "32", "path" => "img/Product_Photo/31. Innisfree Bright Solution Mask 22ml/2.jpg"],
            ["product_id" => "32", "path" => "img/Product_Photo/31. Innisfree Bright Solution Mask 22ml/3.jpg"],

            ["product_id" => "33", "path" => "img/Product_Photo/32. Bourjois Vitamin C Exfoliating Cream - 75ml Radiance Boosting Face Scrub/1.jpg"],
            ["product_id" => "33", "path" => "img/Product_Photo/32. Bourjois Vitamin C Exfoliating Cream - 75ml Radiance Boosting Face Scrub/2.jpg"],
            ["product_id" => "33", "path" => "img/Product_Photo/32. Bourjois Vitamin C Exfoliating Cream - 75ml Radiance Boosting Face Scrub/3.jpg"],

            ["product_id" => "34", "path" => "img/Product_Photo/33. Vichy Moisturizing Lipstick No Color Softening Lips 4.5g/1.jpg"],
            ["product_id" => "34", "path" => "img/Product_Photo/33. Vichy Moisturizing Lipstick No Color Softening Lips 4.5g/2.jpg"],
            ["product_id" => "34", "path" => "img/Product_Photo/33. Vichy Moisturizing Lipstick No Color Softening Lips 4.5g/3.jpg"],

            ["product_id" => "35", "path" => "img/Product_Photo/34. Maybelline Light Brown Double Head Eyebrow Pencil 0.16g/1.jpg"],
            ["product_id" => "35", "path" => "img/Product_Photo/34. Maybelline Light Brown Double Head Eyebrow Pencil 0.16g/2.jpg"],
            ["product_id" => "35", "path" => "img/Product_Photo/34. Maybelline Light Brown Double Head Eyebrow Pencil 0.16g/3.jpg"],

            ["product_id" => "36", "path" => "img/Product_Photo/35. Makeup Remover Perfect Cleansing Water Oil Clear/1.jpg"],
            ["product_id" => "36", "path" => "img/Product_Photo/35. Makeup Remover Perfect Cleansing Water Oil Clear/2.jpg"],
            ["product_id" => "36", "path" => "img/Product_Photo/35. Makeup Remover Perfect Cleansing Water Oil Clear/3.jpg"],

            ["product_id" => "37", "path" => "img/Product_Photo/36. Bioderma Acne Removal And Prevention Cream 30ml/1.jpg"],
            ["product_id" => "37", "path" => "img/Product_Photo/36. Bioderma Acne Removal And Prevention Cream 30ml/2.png"],
            ["product_id" => "37", "path" => "img/Product_Photo/36. Bioderma Acne Removal And Prevention Cream 30ml/3.jpg"],

            ["product_id" => "38", "path" => "img/Product_Photo/37. TheFaceShop Oil Clear Blotting Powder/1.jpg"],
            ["product_id" => "38", "path" => "img/Product_Photo/37. TheFaceShop Oil Clear Blotting Powder/2.jpg"],
            ["product_id" => "38", "path" => "img/Product_Photo/37. TheFaceShop Oil Clear Blotting Powder/3.jpg"],

            ["product_id" => "39", "path" => "img/Product_Photo/38. Nivea Sunscreen Oil Control Himalayan Salt 40ml/1.jpg"],
            ["product_id" => "39", "path" => "img/Product_Photo/38. Nivea Sunscreen Oil Control Himalayan Salt 40ml/2.jpg"],
            ["product_id" => "39", "path" => "img/Product_Photo/38. Nivea Sunscreen Oil Control Himalayan Salt 40ml/3.jpg"],

            ["product_id" => "40", "path" => "img/Product_Photo/39. Victoria's Secret Very Sexy Body Lotion 250ml/1.jpg"],
            ["product_id" => "40", "path" => "img/Product_Photo/39. Victoria's Secret Very Sexy Body Lotion 250ml/2.jpg"],
            ["product_id" => "40", "path" => "img/Product_Photo/39. Victoria's Secret Very Sexy Body Lotion 250ml/3.jpg"],

            ["product_id" => "41", "path" => "img/Product_Photo/40. L'Oréal Paris 115 I'm Worth It Premium Lipstick L'Oréal Paris 115 I'm Worth It 7ml/1.jpg"],
            ["product_id" => "41", "path" => "img/Product_Photo/40. L'Oréal Paris 115 I'm Worth It Premium Lipstick L'Oréal Paris 115 I'm Worth It 7ml/2.jpg"],
            ["product_id" => "41", "path" => "img/Product_Photo/40. L'Oréal Paris 115 I'm Worth It Premium Lipstick L'Oréal Paris 115 I'm Worth It 7ml/3.jpg"],

            ["product_id" => "42", "path" => "img/Product_Photo/41. Moroccanoil Treatment Hair Oil 100ml/1.jpg"],
            ["product_id" => "42", "path" => "img/Product_Photo/41. Moroccanoil Treatment Hair Oil 100ml/2.jpg"],
            ["product_id" => "42", "path" => "img/Product_Photo/41. Moroccanoil Treatment Hair Oil 100ml/3.jpg"],

            ["product_id" => "43", "path" => "img/Product_Photo/42. CHANEL LES BEIGES LIP BALM/1.jpg"],
            ["product_id" => "43", "path" => "img/Product_Photo/42. CHANEL LES BEIGES LIP BALM/2.jpg"],
            ["product_id" => "43", "path" => "img/Product_Photo/42. CHANEL LES BEIGES LIP BALM/3.jpg"],

            ["product_id" => "44", "path" => "img/Product_Photo/43. Laneige Lip Sleeping Mask Apple Flavor 20g/1.jpg"],
            ["product_id" => "44", "path" => "img/Product_Photo/43. Laneige Lip Sleeping Mask Apple Flavor 20g/2.jpg"],
            ["product_id" => "44", "path" => "img/Product_Photo/43. Laneige Lip Sleeping Mask Apple Flavor 20g/3.jpg"],

            ["product_id" => "45", "path" => "img/Product_Photo/44. HATOMUGI Shower Gel Brightening Skin 800ml/1.jpeg"],
            ["product_id" => "45", "path" => "img/Product_Photo/44. HATOMUGI Shower Gel Brightening Skin 800ml/2.jpg"],
            ["product_id" => "45", "path" => "img/Product_Photo/44. HATOMUGI Shower Gel Brightening Skin 800ml/3.jpg"],

            ["product_id" => "46", "path" => "img/Product_Photo/45. La Roche-Posay Deep Cleansing Foam For Oily Acne Skin 125ml/1.jpg"],
            ["product_id" => "46", "path" => "img/Product_Photo/45. La Roche-Posay Deep Cleansing Foam For Oily Acne Skin 125ml/2.jpg"],
            ["product_id" => "46", "path" => "img/Product_Photo/45. La Roche-Posay Deep Cleansing Foam For Oily Acne Skin 125ml/3.jpg"],

            ["product_id" => "47", "path" => "img/Product_Photo/46. Vichy Anti-Wrinkle & Firming Eye Cream 15ml/1.jpg"],
            ["product_id" => "47", "path" => "img/Product_Photo/46. Vichy Anti-Wrinkle & Firming Eye Cream 15ml/2.jpg"],
            ["product_id" => "47", "path" => "img/Product_Photo/46. Vichy Anti-Wrinkle & Firming Eye Cream 15ml/3.png"],

            ["product_id" => "48", "path" => "img/Product_Photo/47. Maybelline Concealer Pen Cushion Reduce Dark Circles 140 Honey 6ml/1.jpg"],
            ["product_id" => "48", "path" => "img/Product_Photo/47. Maybelline Concealer Pen Cushion Reduce Dark Circles 140 Honey 6ml/2.jpg"],
            ["product_id" => "48", "path" => "img/Product_Photo/47. Maybelline Concealer Pen Cushion Reduce Dark Circles 140 Honey 6ml/3.jpg"],

            ["product_id" => "49", "path" => "img/Product_Photo/48. L'Oreal Hair Color Conditioner 6.1 Smoky Brown 172ml/1.jpg"],
            ["product_id" => "49", "path" => "img/Product_Photo/48. L'Oreal Hair Color Conditioner 6.1 Smoky Brown 172ml/2.jpg"],
            ["product_id" => "49", "path" => "img/Product_Photo/48. L'Oreal Hair Color Conditioner 6.1 Smoky Brown 172ml/3.jpg"],

            ["product_id" => "50", "path" => "img/Product_Photo/49. Sunplay Sunscreen Milk Prevents Darkening, Outstanding Protection 30g/1.jpg"],
            ["product_id" => "50", "path" => "img/Product_Photo/49. Sunplay Sunscreen Milk Prevents Darkening, Outstanding Protection 30g/2.jpg"],
            ["product_id" => "50", "path" => "img/Product_Photo/49. Sunplay Sunscreen Milk Prevents Darkening, Outstanding Protection 30g/3.jpg"],

            ["product_id" => "51", "path" => "img/Product_Photo/50. Vaseline Lip Balm 10g Lip Therapy Advanced Healing/1.jpg"],
            ["product_id" => "51", "path" => "img/Product_Photo/50. Vaseline Lip Balm 10g Lip Therapy Advanced Healing/2.jpg"],
            ["product_id" => "51", "path" => "img/Product_Photo/50. Vaseline Lip Balm 10g Lip Therapy Advanced Healing/3.jpg"],

        ]);
    }
}

class categorySeeder extends Seeder
{
    public function run()
    {
        DB::table('category')->insert([
            ["name"=>"LIP STICK","description"=>"Lip makeup in liquid form"]	,
            ["name"=>"LIP LACQUER","DESCRIPTION"=>"Lip makeup in solid form"]	,
            ["name"=>"LIP MASK","DESCRIPTION"=>"Lip balm supplement"]	,
            ["name"=>"LIP BAML","DESCRIPTION"=>"Lip balm supplement"]	,
            ["name"=>"BODY LOTION","DESCRIPTION"=>"Add moisture to the skin"]	,
            ["name"=>"MAKE UP REMOVING","DESCRIPTION"=>"remove make up"]	,
            ["name"=>"SUNSCREEN","DESCRIPTION"=>"Protect your skin under the sun"]	,
            ["name"=>"SHOWER GEL","DESCRIPTION"=>"Body cleansing"]	,
            ["name"=>"SHAMPOO","DESCRIPTION"=>"Hair cleasing"]	,
            ["name"=>"CONDITIONER","DESCRIPTION"=>"Hair treatment"]	,
            ["name"=>"WAX","DESCRIPTION"=>"Remove hair body"]	,
            ["name"=>"HAIR MASK","DESCRIPTION"=>"Cover face "]	,
            ["name"=>"HAIR SERUM","DESCRIPTION"=>"Cover face "]	,
            ["name"=>"HAIR SPRAY","DESCRIPTION"=>"Blemish & Balm cream"]	,
            ["name"=>"HAIR WAX","DESCRIPTION"=>"Hair design"]	,
            ["name"=>"HAIR COLOR","DESCRIPTION"=>"Hair design"]	,
            ["name"=>"FOUNDATION","DESCRIPTION"=>"Cover face "]	,
            ["name"=>"CUSHION","DESCRIPTION"=>"Cover face "]	,
            ["name"=>"BB CREAM","DESCRIPTION"=>"Blemish & Balm cream"]	,
            ["name"=>"CONCEALER","DESCRIPTION"=>"CONCEALER"]	,
            ["name"=>"HIGHLIGHTER","DESCRIPTION"=>"HIGHLIGHTER"]	,
            ["name"=>"PRIMER","DESCRIPTION"=>"PRIMER"]	,
            ["name"=>"POWDER ","DESCRIPTION"=>"POWDER "]	,
            ["name"=>"PACT","DESCRIPTION"=>"PACT"]	,
            ["name"=>"BLUSH","DESCRIPTION"=>"BLUSH"]	,
            ["name"=>"EYE LINER","DESCRIPTION"=>"EYE LINER"]	,
            ["name"=>"MASCARA","DESCRIPTION"=>"MASCARA"]	,
            ["name"=>"EYESHADOW","DESCRIPTION"=>"EYESHADOW"]	,
            ["name"=>"EYE BROWN","DESCRIPTION"=>"EYE BROWN"]	,
            ["name"=>"MAKEUP TOOLS","DESCRIPTION"=>"MAKEUP TOOLS"]	,
            ["name"=>"GEL CLEASING","DESCRIPTION"=>"GEL CLEASING"],
            ["name"=>"EXFOLIATE FACIAL SKIN","DESCRIPTION"=>"EXFOLIATE FACIAL SKIN"],
            ["name"=>"TONER","DESCRIPTION"=>"TONER"],
            ["name"=>"SERUM","DESCRIPTION"=>"SERUM"],
            ["name"=>"CREAM","DESCRIPTION"=>"CREAM"],
            ["name"=>"MASK","DESCRIPTION"=>"MASK"]
        ]);
    }
}

class tagSeeder extends Seeder
{
    public function run()
    {
        DB::table('tag')->insert([
            ["label"=>"OIL SKIN"]	,
            ["label"=>"DRY SKIN"]	,
            ["label"=>"MATERIAL SKIN"]	,
            ["label"=>"SENSITIVE SKIN"]	,
            ["label"=>"REMOVE MAKEUP"]	,
            ["label"=>"SCRUB"]	,
            ["label"=>"PEELING"]	,
            ["label"=>"LOTION"]	,
            ["label"=>"EYE MAKEUP"]	,
            ["label"=>"SUNSCREEN"]	,
            ["label"=>"MOISTURIZER"]	,
            ["label"=>"YELLOW SKIN"]	,
            ["label"=>"WHITE SKIN"]	,
            ["label"=>"DART SKIN"]	,
            ["label"=>"ANTI AGING"]	,
            ["label"=>"ANTI ACNE"]	,
            ["label"=>"MATTE"]	,
            ["label"=>"GLOWY"]	,
            ["label"=>"SEMI-MATTE"]	,
            ["label"=>"MAKEUP LIP"]	,
            ["label"=>"MAKEUP FACE"]	,
            ["label"=>"DENTISTE"]	,
            ["label"=>"MOUTWASHE"]	,
            ["label"=>"COLOR HAIR"]	,
            ["label"=>"DAMAGE HAIR"]	,
            ["label"=>"ANTI DANDRUFF"]	,
            ["label"=>"SMOOTH HAIR"]	,
            ["label"=>"AHA/BHA"]	,
            ["label"=>"SEBUM"]	,
            ["label"=>"MASK"]
        ]);
    }
}


class productSeeder extends Seeder
{
    public function run()
    {
        DB::table("product")->insert([
            ["name"=>"VASELINE Body Lotion Healthy White UV","category_id"=>"5","brand_id"=>"1","description"=>"Vaseline Healthy White Lightening Lotion is a moisture restoring formula that is enriched with Vitamin B3 and Triple Sunscreens to protect skin damage due to sun exposure. It works by inhibiting the melanin transfer so there is lesser wrinkle, uneven skin tone, and dark spots on the skin.How to Use : Apply Vaseline Healthy White Lightening Lotion  to your hand and spread across your body until absorbed. Use twice a day for best results. Apply thoroughly to avoid product rubbing off on clothes.Ingredient : Water, Isopropyl Myristate, Stearic Acid, Glyceryl Stearate, Mineral Oil, Ethylhexyl Methoxycinnamate, Glycerin, Niacinamide, Butyl Methoxydibenzoylmethane, Titanium dioxide, Sodium Ascorbyl Phosphate, Tocopheryl Acetate, Glutathione, Cystine, Glycine, Petrolatum, Dimethicone, Carbomer, Cetyl alcohol, Perfume, Triethanolamine, Potassium Hydroxide, Sodium PCA, Aluminum Hydroxide, BHT, Disodium EDTA, Phenoxyethanol, Methylparaben, Propylparaben","status"=>"1","price"=>"6","discount"=>"10","quantity"=>"2","tax"=>"10","feature"=>"feature 1","mark"=>"1"]	,
            ["name"=>"Bioderma Refreshing Feeling - for Sensitive","category_id"=>"6","brand_id"=>"6","description"=>"Sensibio H2O is a cleansing and makeup removing micellar water for sensitive skin. Made up of micelles with excellent cleansing and makeup removing properties, Sensibio H2O cleanses the face in the morning and evening, thus helps to prevent pollutants likely to exacerbate skin sensitivity from penetrating the skin.

How to Use : Soak a cotton pad with Sensibio H2O. Gently cleanse and/or remove makeup from your face and eyes.For longwear or heavy makeup, allow the cotton pad sit on eyelids for a few seconds.Don't forget the neck area. No rinsing required.Follow with Sensibio Lotion.

Ingredient : WATER (AQUA), PEG-6 CAPRYLIC/CAPRIC GLYCERIDES, CUCUMIS SATIVUS (CUCUMBER) FRUIT EXTRACT, MANNITOL, XYLITOL, RHAMNOSE, FRUCTOOLIGOSACCHARIDES, PROPYLENE GLYCOL, DISODIUM EDTA, CETRIMONIUM BROMIDE. ","status"=>"1","price"=>"19.5","discount"=>"11","quantity"=>"6","tax"=>"5","feature"=>"feature 2","mark"=>"2"]	,

            ["name"=>"Sunplay Skin Aqua Tone Up UV Essence","category_id"=>"7","brand_id"=>"8","description"=>"Tone Up UV Essence by Skin Aqua is face and body Japanese sunscreen that was released in 2018. Resistant to water and sweat. Double as a makeup base. Removable with face wash or soap.

How to Use : Apply the sunscreen evenly over face or body. Reapply regularly especially after sweat or towelling dry to ensure maximum effectiveness. To remove, wash and rinse thoroughly with soap. Replace cap immediately after use.

Ingredient : Water, Ethylhexyl Methoxycinnamate, Butylene Glycol, Diphenylsiloxy Phenyl Trimethicone, Titanium Dioxide, Diethylamino Hydroxybenzoyl Hexyl Benzoate, Sodium Hyaluronate, Magnesium Ascorbyl Phosphate, Passiflora Edulis Fruit Extract, Hydrolyzed Prunus Domestica, Rosa Roxburghii Fruit Extract, Bis-PEG-18 Methyl Ether Dimethyl Silane, Methyl Methacrylate/Glycol Dimethacrylate Crosspolymer, Bis-Ethylhexyloxyphenol Methoxyphenyl Triazine, Acrylates Copolymer, Polysorbate 60, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Triethanolamine, Ammonium Acryloyldimethyltaurate/VP Copolymer, Silica, PEG-12 Dimethicone, Polystyrene, Polyvinyl Alcohol, Disodium EDTA, Xantham Gum, Alumina, Butylated Hydroxytoluene, Polyglyceryl-2 Triisostearate, Synthetic Fluorphlogopite, Tin Oxide, CI 73360, CI 42090, Fragrance.","status"=>"1","price"=>"7.7","discount"=>"12","quantity"=>"1","tax"=>"2","feature"=>"feature 3","mark"=>"3"]	,

            ["name"=>"superstay 24h full coverage foundation","category_id"=>"12","brand_id"=>"15","description"=>"Winner of Allure's Best of Beauty Award, the Maybelline Super Stay® Full Coverage Foundation Makeup delivers 24-hour wear for concentrated coverage and a flawless finish that doesn't fade or shift all day.

How to Use : Apply to the face and blend with fingertip, sponge, or Maybelline Blender.

Ingredient : CYCLOPENTASILOXANE, AQUA / WATER, POLYPROPYLSILSESQUIOXANE,ISODODECANE,DIMETHICONE,C30-45 ALKYLDIMETHYLSILYL POLYPROPYLSILSESQUIOXANE, PEG-10 DIMETHICONE, GLYCERIN,SILICA, DIMETHICONE/POLYGLYCERIN-3 CROSSPOLYMER, SODIUM CHLORIDE, NYLON-12, PHENOXYETHANOL,
DISTEARDIMONIUM HECTORITE,DISODIUM STEAROYL GLUTAMATE,CYCLOMETHICONE,CHLORPHENESIN,ETHYLPARABEN,DISODIUM EDTA, ACRYLONITRILE/METHYL METHACRYLATE/VINYLIDENE CHLORIDE COPOLYMER,
ALUMINUM HYDROXIDE ,DIPROPYLENE GLYCOL,ISOBUTANE,PARAFFIN, SODIUM CITRATE, TOCOPHEROL, ISOPROPYL ALCOHOL,[+/- MAY CONTAIN CI 77891 / TITANIUM DIOXIDE, CI 77491, CI 77492, CI 77499 / IRON OXIDES ] G854042","status"=>"1","price"=>"7.5","discount"=>"10","quantity"=>"2","tax"=>"5","feature"=>"feature 4","mark"=>"4"]	,

            ["name"=>"The Face Shop Ink Gel Slim Pencil Eyeliner","category_id"=>"9","brand_id"=>"13","description"=>"The thin and light 1.5mm pencil helps to draw the eye line distinctively and naturally.
With gel touch formula which helps drawing a smooth and clean eye line.
Power Defense Polymer can block the water and sebum which can let the eye makeup last for longer hours.

How to Use : Draw a smooth eye line on the eyelashes. Wait 10-20 seconds to dry for a better fitting performance. The pencil may be broken if the contents is came out too much, spin for 1mm long to use is recommended.

Ingredient : Trimethylsiloxysilicate, Dimethicone, Polyethylene, Acrylates/Stearyl Acrylate/Dimethicone Methacrylate Copolymer, Iron Oxide Black (CI 77499), Mica (CI 77019), Caprylyl Glycol, Glyceryl Caprylate, Ceresin, Isohexadecane, Carnauba Wax, Synthetic Wax, Methyl Trimethicone, Triethoxycaprylylsilane","status"=>"1","price"=>"11.2","discount"=>"15","quantity"=>"2","tax"=>"5","feature"=>"feature 5","mark"=>"5"]	,

            ["name"=>"Makeup Voluminous Waterproof Mascara","category_id"=>"22","brand_id"=>"20","description"=>"Volumizing And Lengthening Mascara: This volumizing and lengthening mascara delivers a full lash fringe that’s feathery soft, with no flaking, no smudging, and no clumping; Just voluptuous volume and intense length
L'Oreal Paris Mascara: Get the long, full eyelashes you love with our best mascaras and primers; Choose from our innovative volumizing formulas and variety of brushes
Create you perfect eye makeup look with our collection of Voluminous mascaras, achieve sleek lines with smudge proof eyeliner, define your brows and discover eye shadow palettes with shades made for every eye color
Because You're Worth It: L'Oreal Paris Makeup helps you create the look you want with our full line of makeup including foundations, concealers, highlighter makeup, brow pencils, eyeshadow palettes, lipsticks and much more
Perfect To Pair With: L'Oreal Paris Infallible Never Fail Mechanical Pencil Eyeliner; With long-lasting, fade-proof color, Infallible Never Fail Eyeliner ensures your look stays put for up to 16 hours

How to Use : Place brush at base of lashes and gently sweep up to tip. Removes easily with waterproof eye makeup remover.

Ingredient : G787979 ISODODECANE CERA ALBA / BEESWAX / CIRE DABEILLE COPERNICIA CERIFERA CERA / CARNAUBA WAX / CIRE DE CARNAUBA DISTEARDIMONIUM HECTORITE DILINOLEIC ACID/BUTANEDIOL COPOLYMER AQUA / WATER / EAU ALLYL STEARATE/VA COPOLYMER ORYZA SATIVA CERA / RICE BRAN WAX PARAFFIN ALCOHOL DENAT. POLYVINYL LAURATE VP/EICOSENE COPOLYMER PROPYLENE CARBONATE TALC SYNTHETIC BEESWAX ETHYLENEDIAMINE/STEARYL DIMER DILINOLEATE COPOLYMER PEG-30 GLYCERYL STEARATE CANDELILLA CERA / CANDELILLA WAX / CIRE DE CANDELILLA PANTHENOL PENTAERYTHRITYL TETRA-DI-T-BUTYL HYDROXYHYDROCINNAMATE BHT [+/- MAY CONTAIN / PEUT CONTENIR CI 77499 / IRON OXIDES CI 77891 / TITANIUM DIOXIDE ] B195341/1","status"=>"1","price"=>"10.8","discount"=>"10","quantity"=>"4","tax"=>"3","feature"=>"feature 6","mark"=>"4"]	,

            ["name"=>"Neo Cushion Glow #23N from LANEIGE","category_id"=>"13","brand_id"=>"18","description"=>"Neo Cushion Glow from LANEIGE —For clear skin and beautifully shine 24 hours, a new cushion reform ready in your hand. 360 degree light diffusion with Liquid Diamond ™ technology that combines fine micro diamond powder help your face look bright and radiant. The skin does not drop during the day. With True Color Solution ™ technology, the skin is radiant all day long. (Prevents Dullness for 12 Hours) Bright, radiant skin for 24 hours with 5.7 times more moisturizing ingredients, keeping your skin hydrated all day long.

How to Use : Choose a shade that fits your skin tone over the face. And use a brighter shade for highlighting the T-Zone (forehead and nose)

Ingredient :Water, Titanium Dioxide (CI 77891), Cyclopentasiloxane, Methyl Trimethicone , Ethylhexyl Methoxycinnamate, etc.","status"=>"1","price"=>"35.1","discount"=>"0","quantity"=>"5","tax"=>"5","feature"=>"feature 7","mark"=>"3"]	,

            ["name"=>"L'absolu Rouge Cream Lipstick - 132 Caprice","category_id"=>"1","brand_id"=>"16","description"=>"Lancôme L'Absolu Rouge Lipstick Cream - 132 Caprice is a elegant and classic lipstick that keeps the lips beautiful and ready to kiss all day. This lipstick not only gives a beautiful look, but also works nurturing . The creamy and silky soft formula is enriched with hyaluronic acid, which adds a lot of moisture . In addition, the formula also contains Pro-Xylane, which is Lancôme's unique molecule, which means that the lips continue to stay supple, smooth and full .

The lipstick holster opens easily and elegantly with a single click at the bottom. This allows you to put Lancôme L'Absolu Rouge Lipstick Cream in your bag with a clear conscience and take it with you everywhere, without having to worry about the lid falling off.

How to Use :- Apply on clean and dry lips as needed

Ingredient : Pentaerythrityl Isostearate/Caprate/Caprylate/Adipate , Macadamia Ternifolia Seed Oil , Octyldodecyl Stearate , Peg-45/Dodecyl Glycol Copolymer , Cera Microcristallina / Microcrystalline Wax , Polyglyceryl-3 Beeswax , Paraffin , Hydrogenated Castor Oil Dimer Dilinoleate , Bis-Diglyceryl Polyacyladipate-2 , Alumina , Synthetic Wax , Tin Oxide , Aqua / Water , Calcium Aluminum Borosilicate , Calcium Sodium Borosilicate , Methicone , Silica , Aluminum Hydroxide , Magnesium Silicate ,Colophonium / Rosin , Propylene Glycol , Hydroxypalmitoyl Sphinganine , Hydroxypropyl Tetrahydropyrantriol , Synthetic Fluorphlogopite , Disteardimonium Hectorite , Tocopheryl Acetate , Pentaerythrityl Tetra-Di-T-Butyl Hydroxyhydrocinnamate , Geraniol , Methyl-2-Octynoate , Hydroxycitronellal , Citronellol , Hexyl Cinnamal , Benzyl Alcohol , Parfum / Fragrance , [+/- May Contain Ci 15850 / Red 6 , Ci 15850 / Red 7 , Ci 15850 / Red 7 Lake , Ci 15985 / Yellow 6 Lake , Ci 17200 / Red 33 Lake , Ci 19140 / Yellow 5 Lake , Ci 42090 / Blue 1 Lake , Ci 45380 / Red 22 Lake , Ci 45410 / Red 28 Lake , Ci 75470 / Carmine , Ci 77120 / Barium Sulfate , Ci 77491, Ci 77492, Ci 77499 / Iron Oxides , Ci 77742 / Manganese Violet , Ci 77891 / Titanium Dioxide , Mica ]
","status"=>"1","price"=>"39.1","discount"=>"0","quantity"=>"6","tax"=>"10","feature"=>"feature 8","mark"=>"5"]	,

            ["name"=>"EFFACLAR GEL FACIAL WASH FOR OILY SKIN","category_id"=>"31","brand_id"=>"11","description"=>"PURIFYING FOAMING GEL CLEANSER FOR OILY SKIN: This gentle facial wash for oily skin with zinc pidolate effectively cleanses away dirt and oil while respecting skin's pH balance. Cleanses and purifies skin without overdrying. Tested on acne-prone skin (non comedogenicity test).
How to Use : Use as a daily face wash for oily skin .Cleanse morning and/or evening .Wet face with lukewarm water and apply small amount of gel, massaging the skin gently to form a rich lather
Rinse thoroughly with water

Ingredient : WATER • SODIUM LAURETH SULFATE • PEG-8 • COCO-BETAINE • HEXYLENE GLYCOL • SODIUM CHLORIDE • PEG-120 METHYL GLUCOSE DIOLEATE • ZINC PCA • SODIUM HYDROXIDE • CITRIC ACID • SODIUM BENZOATE • PHENOXYETHANOL • CAPRYLYL GLYCOL • PARFUM/FRAGRANCE.
","status"=>"1","price"=>"15","discount"=>"5","quantity"=>"8","tax"=>"5","feature"=>"feature 9","mark"=>"3"]	,

            ["name"=>"L'Oreal Paris Wear Powder Foundation","category_id"=>"23","brand_id"=>"20","description"=>"Want lasting coverage with a matte finish? Create a flawless finish with NEW Infallible 24H freshwear foundation in a powder by L'Oreal Paris. A one-step foundation in a powder that gives you the lasting coverage of a liquid foundation yet mattifies like a powder, for flawless skin that looks fresh hour after hour.  Water, sweat and heat resitant. A longwear powder that stays put all day, with up to 24H wear. Discover the rest of the Infallible range (including our much loved 24h Freshwear foundation and our More Than Concealer), for the ultimate longwear makeup regime.

How to Use :Use brush/sponge to apply all over face. Build as needed.

Ingredient : Talc, Zinc Stearate, Dimethicone, Zea Mays Starch/Corn Starch, Caprylic/Capric Triglyceride, Silica, Dimethicone/Vinyl Dimethicone Crosspolymer, Triethoxycaprylylsilane, Caprylyl Glycol, Ethylhexylglycerin, Potassium Sorbate, Parfum/Fragrance, Isoceteth-10, Alaria Esculenta Extract, Hexyl Cinnamal, Benzyl Salicylate, Linalool, Alpha-Isomethyl Ionone, Benzyl Alcohol, Citronellol, Tocopherol, [+/- May Contain / Peut Contenir CI 77891 / Titanium Dioxide CI 77491, CI 77492, CI 77499 / Iron Oxides, Mica CI 19140 / Yellow 5 Lake CI 77007 / Ultramarines CI 15850 / Red 7 Lake].","status"=>"1","price"=>"15.5","discount"=>"6","quantity"=>"7","tax"=>"5","feature"=>"feature 10","mark"=>"4"]	,

            ["name"=>"Innisfree Super Volcanic Pore Clay Mask 2X","category_id"=>"36","brand_id"=>"14","description"=>"This 10-in-1 clay mask by Innisfree is formulated with Jeju Volcanic Cluster Sphere that features twice more powerful adherence to sebum for intensive pore care. It tightens pores and controls sebum production sebum while gently exfoliating to remove blackheads. This volcanic clay mask deeply cleanses the skin leaving it with a cooling effect and a softer, brighter and firm looking skin.

How to Use After washing your face, apply the Jeju Volcanic Clay Mask evenly on the face except the eye and lip area. Let stand 10 minutes and then clean the face with a massage with water.

Ingredient : Water / Aqua / Eau, Titanium Dioxide (Ci 77891), Butylene Glycol, Volcanic Ash, Glycerin, Silica, Trehalose, Caprylic/Capric Triglyceride, Kaolin, Bentonite, Polyvinyl Alcohol, Glyceryl Stearate, Stearic Acid, Cetearyl Alcohol, 1,2-Hexanediol, Pvp, Peg-100 Stearate, Polysorbate 60, Iron Oxides (Ci 77499), Hydrogenated Vegetable Oil, Xanthan Gum, Juglans Regia (Walnut) Shell Powder, Lactic Acid/Glycolic Acid Copolymer, Sorbitan Stearate, Zea Mays (Corn) Starch, Polyacrylate-13, Polysorbate 20, Mannitol, Dextrin, Theobroma Cacao (Cocoa) Extract, Microcrystalline Cellulose, Lactic Acid, Polyisobutene, Menthoxypropanediol, Tetrasodium Pyrophosphate, Disodium Edta, Ethylhexylglycerin, Sorbitan Isostearate, Aluminum Hydroxide, Triethoxycaprylylsilane, Tocopherol","status"=>"1","price"=>"11.3","discount"=>"5","quantity"=>"4","tax"=>"5","feature"=>"","mark"=>"3"]	,

            ["name"=>"Hatomugi Body Lotion 400ml Body Milk","category_id"=>"5","brand_id"=>"3","description"=>"Hatomugi Body Milk Body Milk is a body lotion from the Japanese cosmetic brand Hatomugi, with ingredients extracted from willow seeds to maintain skin moisture, bring moist skin, soften skin. and effective whitening.

How to Use : Take an appropriate amount of body lotion and spread it all over the body. Gently massage until the essence is fully absorbed into the skin.

Ingredient : Water, glycerin, coix seed extract, Squalane, hyaluronic acid Na, carbomer, betaine, dimethicone, steareth - 6, EDTA-4Na, hydroxide Na, phenoxyethanol, mineral oil, BG, benzoic acid Na, methylparaben, fragrance.
","status"=>"1","price"=>"6","discount"=>"10","quantity"=>"4","tax"=>"5","feature"=>"","mark"=>"4"]	,

            ["name"=>"VITALUMIÈRE AQUA - CHANEL","category_id"=>"17","brand_id"=>"17","description"=>"With a soft, water-light texture and light-to-medium coverage, the tiniest drop of this hybrid fluid foundation creates a natural-looking glow. Skin looks refined and feels refreshed, for an exquisite makeup experience.

How to Use : Shake before use. Gently pat, dab or stipple with brush onto entire face — or key areas— and blend from the center of the face outward.

Ingredient : OCTINOXATE  6 % , TITANIUM DIOXIDE  5.6 % , OTHER INGREDIENTS , water , methyl trimethicone , alcohol , dimethicone , phenyl trimethicone , butylene glycol , talc , isododecane , polymethylsilsesquioxane , acrylates/polytrimethylsiloxymethacrylate copolymer , polymethyl methacrylate , nelumbo nucifera flower water , PEG-10 dimethicone , alumina , dimethicone/PEG-10/15 crosspolymer , stearic acid , aluminum hydroxide , phenoxyethanol , magnesium sulfate , fragrance , triethoxycaprylylsilane , methylparaben , sodium hyaluronate , tocopheryl acetate , dipropylene glycol , polyurethane-15 , BHT , laminaria digitata extract , tocopherol , propylparaben , ethylparaben , [+ / - (MAY CONTAIN) , ultramarines , iron oxides , titanium dioxide , mica , IL18A-I
","status"=>"1","price"=>"5","discount"=>"5","quantity"=>"6","tax"=>"5","feature"=>"","mark"=>"3"]	,

            ["name"=>"Nivea Lip Balm Strawberry Flavor 4.8g","category_id"=>"4","brand_id"=>"4","description"=>"Nivea Caring Lip Balm is a line of lip care products from the famous Nivea cosmetic brand originating from Germany, with a lead-free formula that is safe for sensitive lip skin, helping to provide professional moisture. deeply keeps the skin of the lips soft and smooth.

How to Use : Apply lip balm to your lips at any time of the day or when you feel your lips are dry, flaky, lifeless. You can apply lip balm before going to bed to keep your lips soft and not dehydrated.

Ingredient : Ricinus Communis Seed Oil, Polyisobutene, Octyldodecanol, Pentaerythrityl Tetraisostearate, Hydrogenated Polydecene, Candelilla Cera, Butyrospermum Parkii Butter, Cera Microcristallina, Isopropyl Palmitate, Synthetic Wax, Polyglyceryl-3 Diisostearate, Glycerin, Glyceryl Glucoside, Aqua, Fragaria Ananassa Fruit Juice, Mica, Propylene Glycol, BHT, Aroma, CI 15985, CI 77891, CI 15850","status"=>"1","price"=>"2.7","discount"=>"10","quantity"=>"10","tax"=>"5","feature"=>"","mark"=>"4"]	,

            ["name"=>"Vichy Aqualia Thermal Cream-Gel","category_id"=>"35","brand_id"=>"12","description"=>"Gel Vichy Aqualia Thermal Rehydrating Cream-Gel belongs to the intensive moisturizing Aqualia Thermal product line from Vichy cosmetic brand, with ingredients Vichy mineral water & Hyaluronic Acid, Sodium PCA, Mannose... to help provide instant moisture. and long-lasting for the skin, minimizing water loss, giving you soft, moist skin for up to 48 hours, while supporting the recovery and nourishment of healthy skin from deep within.

How to Use : Use after applying essence. Take an amount of cream the size of a grain of corn, dot 5 points: forehead, nose, chin and cheeks. Apply from the inside out, from top to bottom.


Ingredient :  Aqua / Water, Glycerin, Alcohol Denat, Caprylic/Capric Triglyceride, Mannose, Carbomer, Sodium Pca, Salicylic Acid, Sodium Hydroxide, Sodium Hyaluronate, Limnanthes Alba Seed Oil / Meadowfoam Seed Oil, Caprylyl Glycol, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Parfum / Fragrance.","status"=>"1","price"=>"6.5","discount"=>"11","quantity"=>"15","tax"=>"5","feature"=>"","mark"=>"4"]	,

            ["name"=>"Bioré Lotion SPF UV Face Milk","category_id"=>"5","brand_id"=>"7","description"=>"Oily skin girls are often afraid to apply sunscreen because they do not like the greasy, secretive feeling that sunscreen brings. In addition, when sweat is washed away, sunscreen is no longer effective, so many women skip this extremely important skin protection step. Then Bioré's Face Milk SPF50+/PA++++ - a specialized sunscreen for oily skin girls is the choice you cannot ignore.


How to Use : Shake well, take an appropriate amount, spread evenly over the skin surface before going out into the sun. For better results, reapply after sweating or swimming for a long time in water. Biore cleanser or makeup remover can be used to clean.

Ingredient :  Ethylhexyl Methoxycinnamate 5.0%, Cyclopentasiloxane 25.7%, Zinc Oxide 12.0%, Lauryl Methacrylate/Sodium Methacrylate Crosspolymer 6.0%, Titanium Dioxide 0.47%, Cyclomethicone, Dimethicone, Alcohol, Water, Lauryl Methacrylate/Sodium Methaxcrylate Crosspolymer, Talc, Glycerin,Titanium Dioxide, Methicone, Mica, Polysilicone-9, Peg-12 Dimethicone, Peg-3 Dimethicone, Cetyl-Pg Hydroxyethyl Palmitamide, Aluminum Hydroxide, Silica, Iron Oxides (Ci 73360), Bht, Barium Sulfate, Aluminum Dimyristate..","status"=>"1","price"=>"3.2","discount"=>"5","quantity"=>"16","tax"=>"5","feature"=>"","mark"=>"4"]	,

            ["name"=>"SENKA Brightening Serum","category_id"=>"34","brand_id"=>"22","description"=>"Skin care is an almost daily routine for women. And one of the ways to increase the effectiveness of your whole skin care process is to invest in a good bottle of skin essence. White Beauty Serum from SENKA brand helps to reduce melanin pigmentation, dark spots, dark spots and freckles, while supporting smooth, clear and moist skin. The product is now available at Hasaki.

How to Use : Wash your face and moisturize with rose water, then take out a sufficient amount of Senka White Beauty Serum in your hand, gently and evenly spread over the entire face, apply more concentratedly on the areas of skin with pigmentation.

Ingredient : Natural ingredients such as rice bran, honey, essence from white silkworm cocoons, rice germ oil, sericin, hydrolyzed silk, wormwood extract, white Mayumi essence are safe and benign.
","status"=>"1","price"=>"7.3","discount"=>"5","quantity"=>"5","tax"=>"5","feature"=>"","mark"=>"4"]	,

            ["name"=>"Bourjois Lipstick Pink 12 Beau","category_id"=>"2","brand_id"=>"19","description"=>"Bourjois Rouge Edition Velvet Lipstick is a lipstick line that is praised by famous bloggers around the world as a liquid lipstick – creamy lipstick – “The Best Liquid Lipstick”! Bourjois lipstick palette is beautiful, delicate, diverse in application colors, has a light and velvety texture, many outstanding colors make you feel natural and comfortable, helping to bring makeup results unexpected and durable for many hours.

How to Use : If you want a light color, you can dot the color on your lips and then use your hands to blend it, if you want a more vibrant color, you can use a brush to blend it directly on your lips.

Ingredient : Dimethicone, Dimethicone/Vinyl Dimethicone Crosspolymer, Butyl Acrylate/Hydroxypropyl Dimethicone Acrylate Copolymer, Trimethylsiloxysilicate, Parfum/Fragrance, Silica, Isoceteth-10, Alumina, Alpha-Isomethyl Ionone, Linalool, Citronellol, Geraniol.","status"=>"1","price"=>"8.6","discount"=>"5","quantity"=>"30","tax"=>"5","feature"=>"","mark"=>"5"]	,

            ["name"=>"Paula's Choice Moisturizing","category_id"=>"35","brand_id"=>"10","description"=>"Paula's Choice Calm Restoring Moisturizer Normal To Oily/Combination is a Paula's Choice brand of moisturizer for normal to oily skin and sensitive skin. Specially formulated with ultra-gentle emollient complexes that quickly hydrate sensitive skin, and natural plant extracts to soothe skin, reduce redness and irritation, and aid in skin repair. effective. The gel texture is smooth, non-sticky, does not irritate the skin.

How to Use : Calm Restoring Moisturizer Normal to Oily/Combination is ideal for smoothing the face and neck area.
After completing the previous skin care steps, you use a small amount that is enough for the entire face.
If used during the day, need to be combined with a sunscreen containing SPF 30 or higher.

Ingredient : Water (Aqua), Cyclopentasiloxane (hydration), Glycerin (skin replenishing), Butylene Glycol (hydration), Bis-Phenylpropyl Dimethicone (hydration), Glycyrrhiza Glabra (Licorice) Root Extract, Allantoin (skin-soothing), Beta-Glucan (skin-soothing/antioxidant), Dipotassium Glycyrrhizate (skin-soothing), Epilobium Angustifolium Flower/Leaf/Stem Extract (willow herb extract/skin-soothing), Phenyl Trimethicone (hydration), Dimethicone (hydration), Dimethicone/Vinyl Dimethicone Crosspolymer (texture-enhancing), Sodium Hyaluronate (hydration/skin replenishing), Arctium Majus Root Extract (burdock extract/skin-soothing), Camellia Sinensis Leaf Extract (green tea/skin-soothing/antioxidant), Laminaria Saccharina Extract (algae extract/hydration/skin-soothing), Vitis Vinifera Seed Extract (grape extract/antioxidant), Panthenol (skin replenishing), Sodium Acrylate/Sodium Acryloyldimethyl Taurate Copolymer (texture-enhancing), Hydroxyethylcellulose (texture-enhancing), Isohexadecane (texture-enhancing), Sodium Carbomer (texture-enhancing), Polysorbate 80 (texture-enhancing), Ethylhexylglycerin (preservative), Phenoxyethanol (preservative).","status"=>"1","price"=>"42.6","discount"=>"0","quantity"=>"20","tax"=>"5","feature"=>"","mark"=>"4"]	,

            ["name"=>"Moroccanoil Moisture Repair","category_id"=>"9","brand_id"=>"21","description"=>"Moroccanoil Moisture Repair Shampoo (Moroccanoil Moisture Repair Shampoo): gently cleanses while improving hair health, helping to repair damage caused by chemical and heat treatments. Formulated with antioxidant-rich Argan oil, natural plant extracts and keratin proteins, it restores elasticity, nourishes dry hair and repairs damaged hair. Free of sulfates, phosphates and parabens, Moroccanoil Moisture Repair Shampoo is color-safe and leaves your hair shiny, healthy and manageable.

How to Use : Take Moroccanoil Moisture Repair Shampoo into your hand and apply evenly to wet hair and scalp, massaging gently. Keep adding water to create more thick foam in the super concentrated formula. Rinse thoroughly with clean water. Wash a second time if needed.

Ingredient :Argan Oil:
Lavender, Rosemary, Chamomile and Jojoba Extracts:
Cocamide Mea:
Keratin:","status"=>"2","price"=>"23.9","discount"=>"5","quantity"=>"8","tax"=>"5","feature"=>"","mark"=>"5"],

            ["name"=>"Maybelline Baby Skin Makeup Primer 22ml Baby Skin Pore Eraser","category_id"=>"22","brand_id"=>"15","description"=>"Maybelline Baby Skin Instant Pore Eraser Primer has perfect coverage, the product will make large pores evaporate instantly with just a thin layer of cream, promising to bring you smooth skin. smooth as baby skin. Besides, you will no longer have to worry about dry, rough skin because the product also has the function of moisturizing the skin all day long. The ability to control oil of Maybelline Baby Skin Instant Pore Eraser primer will surely make oily skin girls fall in love, the skin will be dry, soft and smooth, the makeup layer will not be patchy or dull for many hours.

How to Use : Take an appropriate amount of the product and dot 5 points on the face (forehead, nose, cheeks and chin), use your hands or a sponge to gently spread all over the face for a beautiful, pink and white skin that is naturally radiant.

Ingredient :DIMETHICONE DIMETHICONE CROSSPOLYMER STEARYL HEPTANOATE CAPRYLYL GLYCOL SILICA SILYLATE PROPYLENE GLYCOL PENTAERYTHRITYL TETRAISOSTEARATE PRUNUS CERASUS EXTRACT / BITTER CHERRY EXTRACT [+/- MAY CONTAIN / PEUT CONTENIR CI 73360 / RED 30 CI 77492 / IRON OXIDES ]","status"=>"1","price"=>"4.13","discount"=>"0","quantity"=>"10","tax"=>"7","feature"=>"","mark"=>"4"],


    ["name"=>"L'Oréal Paris Color Conditioner 165ml Elseve Color Protect","category_id"=>"10","brand_id"=>"20","description"=>"For dyed hair, frequent washing & combing along with the external impact of the environment will make the hair color fade quickly. L'Oréal Paris Elseve Color Protect Conditioner comes from the high-class L'Oréal Paris cosmetic brand originating from France - one of the leading hair care brands in the world, helping to take care of the hair. Professionally and effectively dyed hair. The product is applied advanced technology to help protect and keep dyed hair color long-lasting. Moreover, it also protects the hair from bad influences from the environment, thereby giving you beautiful shiny hair and natural color.

How to Use : Use after shampoo step, take an appropriate amount of conditioner on the palm. Gently massage conditioner into hair. Pay attention to 5cm from the hairline. Then rinse with warm/cool water..

Ingredient :AQUA/WATER, CETYL ALCOHOL, TOCOPHEROL, HYDROXYETHYLCELLULOSE, PHENOXYETHANOL BEHENTRIMONIUM CHLORIDE, ETHYLHEXYL METHOXYCINNAMTE, TRIDECETH-5, TRIDECETH-10, CHLORHEXIDINE DIGLUCONATE BENZYL ALCOHOL, BENZYL SALICYLATE, LINALOOL, BENZOPHENONE-4, AMODIMETHICONE, ISOPROPYL ALPHA-ISOMETHYL IONONE MYRISTYL ALCOHOL GERANIOL CETYLESTERS CETEARYL ALCOHOL CETRIMONIUM CHLORIDE CITRIC ACID BUTYLPHENYL METHYLPROPIONAL CITRONELLOL GLYCERIN PARFUM FRAGRANCE","status"=>"2","price"=>"2.6","discount"=>"21","quantity"=>"10","tax"=>"7","feature"=>"","mark"=>"3"],

            ["name"=>"Paula's Choice 5% AHA Exfoliating Scrub For Normal Dry Skin 50ml Resist Daily Smoothing Treatment 5% AHA","category_id"=>"32","brand_id"=>"10","description"=>"Paula's Choice 5% AHA Resist Daily Smoothing Treatment 5% AHA is a chemical exfoliant from Paula's Choice cosmetic brand, containing 5% AHA concentration suitable for normal skin to dry, helps to remove dead cells and promote new skin cell renewal, restoring a youthful and radiant appearance, while brightening and even skin tone, helping to fade brown spots and fine lines.

How to Use : Use after cleansing and balancing skin. In the event that flaking occurs, you need to reduce the frequency of use and add a moisturizer of the right texture. During the day, use a sunscreen with an SPF of 30 or higher.

Ingredient :Water (Aqua), Glycolic Acid (alpha hydroxy acid/exfoliant), Cetyl Alcohol (texture-enhancing), Butylene Glycol (hydration), Dimethicone (hydrations/texture enhancer), Polyacrylamide (texture-enhancing), PPG-14 Butyl Ether (texture-enhancing), Palmitoyl Hexapeptide-12 (skin-restoring ingredient), Ceramide NG (skin replenishing), Tetrahydrodiferuloylmethane, Tetrahydrodemethoxydiferuloylmethane, Tetrahydrobisdemethoxydiferuloylmethane (skin-soothing/antioxidants derived from curcumin), Epigallocatechin Gallate (antioxidant), Salicylic Acid (BHA exfoliant/skin-soothing), Disodium Lauriminodipropionate Tocopheryl Phosphates (vitamin e based antioxidant), PEG-10 Phytosterol, Cucumis Melo (Melon Fruit Extract (antioxidant), Bisabolol (skin-soothing), Allantoin (skin-soothing), Cyclopentasiloxane, Cyclohexasiloxane, Dimethiconol (hydrations/texture enhancers), Tribehenin (texture enhancer), Polysorbate 20 (texture-enhancing), C12-15 Alkyl Benzoate, PEG-40 Stearate, Sorbitan Stearate (texture-enhancings), PVM/MA Decadiene Crosspolymer, Disodium EDTA (stabilizer), C13-14 Isoparaffin (solvent), Laureth-7 (texture-enhancing), Sodium Hydroxide (pH adjuster), Caprylyl Glycol (preservative), Ethylhexylglycerin (skin conditioning agent), Hexylene Glycol (solvent), Phenoxyethanol (preservative).
","status"=>"1","price"=>"32.3","discount"=>"5","quantity"=>"20","tax"=>"8","feature"=>"","mark"=>"3"],

            ["name"=>"Lancôme Youthful & Radiant Skin Care 7ml Advanced Genifique","category_id"=>"34","brand_id"=>"16","description"=>"Lancôme Advanced Genifique Essence for Youthful & Radiant Skin is the divine  Black Serum product line from the high-end cosmetic brand Lancôme Paris, applying science to the skin microbiome with 7 types of Probiotics and Prebiotics, helping to increase strengthen the immune system, promote the production of new proteins, thereby supporting cell regeneration and restoring skin structure, deeply moisturizing the skin, nourishing the skin more firm and smooth.

How to Use : Use twice, every morning and evening. Use after lotion step. Take 1 tube, gently apply all over the face and neck, then use the serum or other skin care products.

Ingredient : Water, Bifida Ferment Lysate, Glycerin, Alcohol Denat., Dimethicone, Hydroxyethylpiperazine Ethane Sulfonic Acid, Ascorbyl Glucoside, Sodium Hyaluronate, Sodium Hydroxide, Sodium Benzoate, Phenoxyethanol, Adenosine, Faex Extract/Yeast Extract/Extrait De Levure, Peg-20 Methyl Glucose Sesquistearate, Peg-60 Hydrogenated Castor Oil, Salicyloyl Phytosphingosine, Ammonium Polyacryldimethyltauramide/Ammonium Polyacryloyldimethyl Taurate, Limonene, Xanthan Gum, Caprylyl Glycol, Disodium Edta, Octyldodecanol, Citronellol, Fragrance.","status"=>"1","price"=>"17.28","discount"=>"0","quantity"=>"21","tax"=>"9","feature"=>"","mark"=>"4"],

            ["name"=>"Banana Boat Ultra Protect Sports Sunscreen SPF110 (90ml)","category_id"=>"7","brand_id"=>"9","description"=>"Banana Boat Ultra Protect Sport Sunscreen SPF110 (90ml) - 521900 provides perfect sun protection for the skin with SPF 110 PA +++ sun protection to help you comfortably exercise in the hot sun while still being protected. Protects against harmful UVA and UVB rays.

How to Use :For the best skin protection, you should apply the cream 30 minutes before going out in the sun and reapply every 2 hours if continuously exposed to the sun.

Ingredient :The product uses AvoTriplex technology to create an effective sunscreen film.
The product has extremely strong SPF 110 sun protection that protects the skin against UVA rays that cause skin aging and UVB rays that cause sunburn, black skin when playing outdoors in the hot sun.","status"=>"1","price"=>"6.5","discount"=>"2","quantity"=>"10","tax"=>"5","feature"=>"","mark"=>"5"],

            ["name"=>"Bath&Body Works Japanese Cherry Blossom Shower Gel","category_id"=>"8","brand_id"=>"2","description"=>"Bath & Body Works Shea & Vitamine Shower Gel 295Ml #Japanese Cherry Blossom is one of the indispensable things for body care. Suitable for all skin types, they will help your skin stay soft and smooth, not only that, but they also provide nutrients to effectively nourish and protect your skin. This is a transparent gel shower gel that softens and cleans the skin, creating a rich lather with a strong fragrance.

How to Use : Wet the body, take an appropriate amount of shower gel, foam and massage on the skin then rinse.

Ingredient :Shea Butter, Aloe Vera, Vitamin E, Jojoba Oil.","status"=>"1","price"=>"12.2","discount"=>"2","quantity"=>"26","tax"=>"6","feature"=>"","mark"=>"5"],

            ["name"=>"Bath & Body Works Black Raspberry Vanilla Shower Gel 295ml","category_id"=>"8","brand_id"=>"2","description"=>"Bath & Body Works Shower Gel has a mild soap and lather formula that leaves you feeling clean yet extremely soft and beautifully scented with rich natural flowers. Bath & Body Works' exclusive shower gel is a blend of ultra-hydrating shea butter, vitamin E and aloe to nourish, hydrate and soften skin while boosting skin's vitality. smooth, youthful, slows down the aging process of the skin.
The liquid gel product does not create much foam, does not dry the skin, balances the moisture of the skin, softens the rough skin layers and drifts away in the shower, the mild fragrance helps you have relaxing moments in the bathroom after A stressful day at work.
The product does not retain a strong scent like when using perfume, but only faintly on the skin, hidden and visible, keeping a gentle fragrance on the body, increasing the charm for women. Scent: Fresh raspberry, ripe blackberry, vanilla orchid, creamy sandalwood, cashmere wood.

How to Use : Wet the body, take an appropriate amount of shower gel, foam and massage on the skin then rinse.

Ingredient :Shea Butter, Aloe Vera, Vitamin E, Jojoba Oil.","status"=>"1","price"=>"12.2","discount"=>"0","quantity"=>"27","tax"=>"7","feature"=>"","mark"=>"5"],
            ["name"=>"Bath & Body Works Body Lotion Moonlight Path 236ml","category_id"=>"5","brand_id"=>"2","description"=>"Bath & Body Works Moonlight Path Body Lotion will soothe you into the most peaceful, soothing sleep. Body lotion provides vitamin E and minerals to help keep skin moisturized regularly. Bath & Body Works body lotion is like a smooth milk that penetrates quickly into the skin. Moonlight lotion helps you beat the rough, rough, dark look caused by cold weather or hot sun. At the same time, this antioxidant helps prevent skin aging, wrinkles, and sagging on the body.

How to Use : After showering, pat dry.  Take a sufficient amount of Bath & Body Works Cream with Moonlight Path fragrance and apply all over the body. Just apply and gently massage your skin so that the Moonlight lotion can be evenly absorbed into the skin.

Ingredient : Shea Butter (Shea Butter), Musk. White orchids, violets, and lavender. With vitamins E, B5…","status"=>"1","price"=>"8","discount"=>"5","quantity"=>"28","tax"=>"8","feature"=>"","mark"=>"5"],

            ["name"=>"VICTORIA'S SECRET Amber Romance shower gel 250ml","category_id"=>"8","brand_id"=>"5","description"=>"This is the best-selling scent of the Victoria Secret shower gel line - the scent is passionate and sexy, it is especially loved by those who like seductive scents, the warm, sensual scent of sexy amber cold and ice cream Anglaise.

How to Use : Wet the body. Apply shower gel all over the body and gently massage. Then rinse with water.

Ingredient : Grape seed extracts, plus antioxidants – vitamins E and C","status"=>"1","price"=>"10","discount"=>"5","quantity"=>"29","tax"=>"9","feature"=>"","mark"=>"4"],

            ["name"=>"Senka Pink Brightening Facial Mask 25ml Perfect Aqua White Mask Extra White","category_id"=>"36","brand_id"=>"22","description"=>"Senka Perfect Aqua White Mask Extra White 25ml is a line of skin care masks from Japanese cosmetic brand Senka, extracted from white silk ingredients and rose essence to support brightening and even skin tone, improving skin tone. fades newly formed brown spots for soft, glowing skin.

How to Use : Clean hands. Use after cleansing and balancing skin. Apply the mask on your face for 15-20 minutes. When taking out the mask, gently pat and massage to allow the moisturizing essence to penetrate deep into the skin.

Ingredient : Rose extract, Aloe Vera Extract ,Hyaluronic Acid, Glycerin","status"=>"1","price"=>"1.5","discount"=>"0","quantity"=>"30","tax"=>"10","feature"=>"","mark"=>"5"],

            ["name"=>" Victoria's Secret Very Sexy Body Lotion 100ml ","category_id"=>"5","brand_id"=>"5","description"=>"Very Sexy 100ml is a signature blend of gentle orchid and sweet vanilla, blended with fresh mandarin and seductive raspberries to create unique notes. Very Sexy is like an earnest invitation of feminine beauty and sensual sublimation emotions that attract everyone around.

How to Use : After bathing, take an appropriate amount of body lotion and apply all over the body.

Ingredient : Shea Butter (Shea Butter), Musk. White orchids, violets, and lavender. With vitamins E, B5…","status"=>"2","price"=>"12.5","discount"=>"1","quantity"=>"31","tax"=>"11","feature"=>"","mark"=>"5"],

            ["name"=>"Innisfree Bright Solution Mask 22ml ","category_id"=>"36","brand_id"=>"14","description"=>"Innisfree Bright Solution Mask 22ml 2-in-1 skin care mask combines pure Vitamin C-infused mask and derivative formula with Niacinamide to help brighten and moisturize the skin.

How to Use : After washing your face, use toner to soothe the skin. Fold the sides into the product along the guide fold line. Then squeeze the Pocket 2 firmly. Squeeze and rub for 30-40 seconds to absorb the mask evenly. Take out the mask from Pocket 1 and apply it to your face. After 10-20 minutes, remove the mask. Lightly pat for absorption.

Ingredient : WATER / AQUA / EAU, GLYCERIN, GLYCERETH-26, PROPANEDIOL, NIACINAMIDE, 1,2-HEXANEDIOL, CYCLOPENTASILOXANE, XANTHAN GUM, PEG-60 HYDROGENATED CASTOR OIL, CYCLOHEXASILOXANE, PEG-10 DIMETHICONE/VINYL DIMETHICONE CROSSPOLYMER, CARBOMER, ARGININE, DIPROPYLENE GLYCOL, BUTYLENE GLYCOL, GLYCYRRHIZA GLABRA (LICORICE) ROOT EXTRACT, CAMELLIA SINENSIS LEAF EXTRACT, ZINGIBER OFFICINALE (GINGER) ROOT EXTRACT, COPTIS CHINENSIS ROOT EXTRACT, GLYCERYL ACRYLATE/ACRYLIC ACID COPOLYMER, ETHYLHEXYLGLYCERIN, SODIUM HYALURONATE, DISODIUM EDTA, FRAGRANCE / PARFUM, MAGNESIUM ASCORBYL PHOSPHATE","status"=>"1","price"=>"3.2","discount"=>"0","quantity"=>"32","tax"=>"12","feature"=>"","mark"=>"5"],


            ["name"=>"Bourjois Vitamin C Exfoliating Cream - 75ml Radiance Boosting Face Scrub ","category_id"=>"32","brand_id"=>"19","description"=>"Bourjois Gommage Visage Booster D'eclat Exfoliating Cream is a breakthrough with the combination of two unique natural ingredients: Bamboo and Orange extracts. Exfoliating molecules from Bamboo will easily remove dirt and old skin cells, while orange essence provides moisture, nourishes, smoothes and anti-aging for your skin. Bright pink and radiant, smooth, youthful and full of life.

How to Use :Wet face, take a small amount of exfoliating cream in the palm of your hand, rub it on your face and gently massage for 1-2 minutes and then rinse. Use 1-2 times/week.

Ingredient : Lavender Essential Oil, White Kaolin Clay, Peppermint Essential Oil","status"=>"1","price"=>"4.2","discount"=>"1","quantity"=>"33","tax"=>"13","feature"=>"","mark"=>"5"],


            ["name"=>"Vichy Moisturizing Lipstick No Color Softening Lips 4.5g Natural Blend Hydrating Lip Balm","category_id"=>"4","brand_id"=>"12","description"=>"Vichy Natural Blend Hydrating Lip Balm is the first lip care product line that has just been launched from the French cosmetic brand Vichy, which deeply moisturizes and nourishes the lips to become soft and smooth instantly. while maintaining long-term moisture for up to hours.

How to Use : Use directly on lips to moisturize lips immediately, reduce dryness and chapped lips for smooth lips.

Ingredient : G20167141 Canola Oil, Ricinus Communis Seed Oil/Castor Seed Oil, Caprylic/Capric Triglyceride, Polyglyceryl-2 Triisostearate, Helianthus Annuus Seed Cera/ Sunflower Seed Wax, Bis-Behenyl/Isostearyl/Phytostearyl Dimer Dilnoleyl Dimer Dilinoleate, Cetyl Palmate, Cera Alba/Beeswax, Helianthus Annuus Seed Oil/Sunflower Seed Oil, Silica, Alumina, Aluminium Hydroxide, Tocopherol, Cocos Nucifera Oil/Coconut Oil, Citric Acid, Parfum/Fragrance, [+/- May contain: CI 15850/ Red 7, CI 15985/ Yellow 6 Lake, CI 45410/Red 28 Lake, CI 45380/Red 22 Lake, CI 77891/ Titanium Dioxide, CI 75470/ Carmine, CI 77492/ Iron Oxides] Code F.I.L.: B226208/1.","status"=>"1","price"=>"5.2","discount"=>"2","quantity"=>"34","tax"=>"14","feature"=>"","mark"=>"4"],

            ["name"=>"Maybelline Light Brown Double Head Eyebrow Pencil 0.16gDefine & Blend Brow Pencil Natural Blend Hydrating
","category_id"=>"29","brand_id"=>"15","description"=>"If the eyes are the window to the soul, then the eyebrows hold an important position in creating the facial expression. The eyes will look much more attractive when above are thick, dense and sharp eyebrows. However, if you happen to own a pair of eyebrows that are sparse, pale and too thin, you can still be completely assured because there is a Maybelline Define & Blend Brow Pencil 2-Headed Eyebrow Pencil that helps conceal unnecessary defects. have this. The product is designed with a convenient screw pen with a diagonal pencil tip and a brush head design that helps to draw and blend eyebrows easily and accurately.

How to Use : Shape the eyebrow shape suitable for the face. Fill in the pale parts and shape the tail of the eyebrown. Blend and brush evenly with the brush head.

Ingredient : Hydrogenated Vegetable Oil, Ozokerite, Copernicia Cerifera Cera / Carnauba Wax, Ricinus Communis Seed Oil / Castor Seed Oil, Sorbitan Tristearate, C10-18 Triglycerides, Tocopherol, Lecithin, Glyceryl Stearate, Ascorbyl Palmitate, Glyceryl Oleate,...","status"=>"1","price"=>"4.3","discount"=>"3","quantity"=>"35","tax"=>"15","feature"=>"","mark"=>"5"],

            ["name"=>"Bioré Cleansing Water 90ml Makeup Remover Perfect Cleansing Water Oil Clear","category_id"=>"6","brand_id"=>"7","description"=>"Bioré Cleansing Water with mild ingredients, does not contain fragrances, colorants, or fragrances but is strong enough to help clean cosmetics such as foundation, powder. In addition, Bioré Makeup Remover Perfect Cleansing Water Oil Clear Bioré also adds white tea extract (Camilla Sinensis Leaf Extract), collagen, witch hazel leaves (Witch Hazel) with moisturizing effects, supporting astringent pores, helping to reduce the appearance of pores. skin lightening and acne prevention. In particular, the product uses Micella technology, which is loved by users thanks to its convenience and time saving, with only one step, it can remove makeup, dirt and do not need to be rinsed with water.accurately.

How to Use :Apply an appropriate amount onto cotton pad and gently wipe from the inside to the outside, from the bottom to the top. Replace with another cotton pad and repeat until the makeup is completely removed. For the eye area, close your eyes, place the liquid makeup remover cotton on your eyes, keep it for 5 seconds before wiping it off. Do not rinse with water.

Ingredient : Water (Aqua), Dipropylene Glycol, PEG-12 Laurate, Butylene Glycol, PEG/PPG/Polybutylene Glycol-8/5/3 Glycerin, PEG-8, PEG-6 Caprylic/Capric Glycerides, Sodium Citrate, Sodium Methyl Stearoyl Taurate, Citric Acid, Disodium EDTA, Phenoxyethanol, Methylparaben, o-Cymen-5-ol.","status"=>"1","price"=>"2.5","discount"=>"0","quantity"=>"36","tax"=>"16","feature"=>"","mark"=>"4"],

            ["name"=>"Bioderma Acne Removal And Prevention Cream 30ml Sebium Global Cream","category_id"=>"35","brand_id"=>"6","description"=>"Oily skin is often prone to acne problems. Therefore, Bioderma's Sébium product line was born and officially introduced in Vietnam to bring an effective solution to clean and care for acne skin to help you say goodbye to acne and maintain a smooth skin. Bioderma Sebium Global Acne Relief Cream is also in that group, with natural ingredients, the product will work deep into the acne-prone skin to improve from the inside, reduce acne, blackheads and return Leaves skin smooth and prevents scarring.

How to Use : After cleansing with Sebium H2O or Sebium Gel Moussant, apply Sebium Global twice a day.

Ingredient : AQUA/WATER/EAU, DIPROPYLENE GLYCOL, CITRIC ACID, CYCLOPENTASILOXANE, SODIUM HYDROXIDE, GLYCERIN, ZINC GLUCONATE, METHYL METHACRYLATE CROSSPOLYMER, SALICYLIC ACID, ARACHIDYL ALCOHOL, DIMETHICONE, MANNITOL, XYLITOL, RHAMNOSE, FRUCTOOLIGOSACCHARIDES, LAMINARIA OCHROLEUCA EXTRACT, GINKGO BILOBA LEAF EXTRACT, BEHENYL ALCOHOL, GLYCERYL STEARATE, PEG-100 STEARATE, SILICA, HYDROXYETHYL ACRYLATE/SODIUM ACRYLOYLDIMETHYL TAURATE COPOLYMER, XANTHAN GUM, ARACHIDYL GLUCOSIDE, GLYCYRRHETINIC ACID, PROPYLENE GLYCOL, POLYSORBATE 60, CAPRYLIC/CAPRIC TRIGLYCERIDE, BAKUCHIOL, SQUALANE, FRAGRANCE (PARFUM","status"=>"1","price"=>"15.5","discount"=>"5","quantity"=>"37","tax"=>"17","feature"=>"","mark"=>"5"],

            ["name"=>"TheFaceShop Oil Clear Blotting Powder Sebium Global Cream","category_id"=>"23","brand_id"=>"13","description"=>"Oil Clear Blotting Power is a transparent powder. Helps absorb excess oil and leave a smooth, dry feeling on the skin's surface. The spread is thin and natural, can be reapplied many times without feeling thick. Oil Clear Blotting Powder is like the smartest, prettiest oil blotting paper that helps control oiliness, keeping makeup smooth and fresh for hours. One of the best powder coating lines from The Face Shop. With excellent oil absorption and oil control, you will be a great support for any skin with oily problems.

How to Use : Use a brush or cotton pad to apply powder all over the skin surface. Concentrate in the T-zone, the area with a lot of oil.

Ingredient : Talc, Silica, Mica (Ci 77019), Tapioca Starch, Lauroyl Lysine, Octyldodecyl Stearoyl Stearate, Triethylhexanoin, 1,2-Hexanediol, Diisostearyl Malate, Dimethicone, Triethoxycaprylylsilane, Acrylates Copolymer, Water/​Eau, Butylene Glycol, Phaseolus Radiatus Seed Extract, Betula Platyphylla Japonica Bark Extract, Rumex Crispus Root Extract, Parfum/​Fragrance, Iron Oxides (Ci 77499)•Iron Oxides (Ci 77492)
","status"=>"1","price"=>"11","discount"=>"50","quantity"=>"38","tax"=>"18","feature"=>"","mark"=>"5"],

            ["name"=>"Nivea Sunscreen Oil Control Himalayan Salt 40ml Triple Protect Acne Oil Control SPF50+ PA+++","category_id"=>"7","brand_id"=>"4","description"=>"Nivea Triple Protect Sunscreen SPF50+ PA+++ 40ml is a sunscreen line from the Nivea cosmetic brand of the German group Beiersdorf, with Triple Defense technology and SPF50+ PA+++ sunscreen to help protect skin from the sun's rays. UVA, UVB, blue light and pollution from the environment. At the same time, the product uses Ultra Light formula for sunscreen that penetrates quickly into the skin, without causing a greasy feeling.

How to Use : Take an appropriate amount and apply evenly to the skin. If you often work outdoors, you should reapply every 2 hours.

Ingredient : Aqua, Homosalate, Alcohol Denat., Butyl Methosydibenzoylmethane, Ethylhexy Salicylate, Octocrylene, Distarch Phosphate, Dimethicone, Phenylbenzimidazole Sulfonic Acid, Behenyl Alcohol, Cetearyl Alcohol, Glycerin, Methylpropanediol, Silica Dimethyl Silylate, Mineral Salts, Carnitine, Glycyrrhiza Inflata Root Extract, Isoamyl Laurate, Sodium Stearoyl Glutamate, Dimethicone Crosspolymer, Carbomer, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Xanthan Gum, Silica, Mica, Sodium Hydroxide, Trisodium EDTA, Phenoxyethanol, Ethylhexylglycerin, Sodium Chloride, Parfum, CI 77891.","status"=>"1","price"=>"12","discount"=>"51","quantity"=>"39","tax"=>"19","feature"=>"","mark"=>"5"],

            ["name"=>"Victoria's Secret Very Sexy Body Lotion 250ml","category_id"=>"5","brand_id"=>"5","description"=>"Victoria Secret Very Sexy Lotion has a luxurious seductive fragrance that lasts for 4-6 hours to help you feel confident. The product provides the necessary moisture and nutrients to nourish the skin smooth, soft, and bright by benign ingredients, safe for sensitive skin, suitable for all skin types.

How to Use : Use body lotion after cleansing and drying the body. Pump an appropriate amount into the palm of your hand and massage all over the body until the essence is completely absorbed. Pay attention to the elbows, knees, rough, rough skin areas, ..

Ingredient :Alcohol Denat, Water (Aqua, Eau), Fragrance (Parfum), Propylene Glyco, Glycerin,Butyl Methoxydibenzoylmethane, Ethylhexyl Methoxycinnamate, PPG-26-Buteth26, Ethylhexl Salicylate, PEG-40 Hydrogenated Castor Oil, Aloe Barbadensis Leaf Extract, Chamomilla Recutita (Matricaria) Flower Extract, Benzyl Alcohol,
Butylphenyl Methylpropional, Limonene, Linalool, Red 33 (CI 17200), Red 40 (CI 16035), Green 3 (CI 42053)","status"=>"1","price"=>"7.6","discount"=>"0","quantity"=>"40","tax"=>"20","feature"=>"","mark"=>"5"],

            ["name"=>"L'Oréal Paris 115 I'm Worth It Premium Lipstick L'Oréal Paris 115 I'm Worth It 7ml Rouge Signature","category_id"=>"1","brand_id"=>"20","description"=>"L'Oreal Rouge Signature Matte Liquid Lipstick is a line of high-quality matte lipsticks from the famous LOreal Paris brand originating from France, with a thin and smooth lipstick texture and light as nothing when applied to the lips, giving Finish is true to matte lipstick but still feels soft and smooth like velvet. In particular, the lipstick has the ability to color extremely well from the first time it touches the lips and lasts up to 8 hours after use.

How to Use :Apply lip balm. Use a lipstick brush and apply evenly before use. Apply full lips or just brush the lips depending on your preference.

Ingredient :Aqua / Water / Eau, Dimethicone, Octyldodecanol, Isododecane, Butylene Glycol, Alcohol, Acrylates/Polytrimethylsiloxymethacrylate Copolymer, Cetyl Peg/Ppg-10/1 Dimethicone, Trimethyl Pentaphenyl Trisiloxane, Disteardimonium Hectorite, Polyglyceryl-4 Isostearate, Magnesium Sulfate, Phenoxyethanol, Propylene Carbonate, Synthetic Fluorphlogopite, Peg/Ppg-18/18 Dimethicone, Alumina, Disodium Stearoyl Glutamate, Aluminum Hydroxide, Linalool, Pentaerythrityl Tetra-Di-T-Butyl Hydroxyhydrocinnamate, Tocopherol, Parfum / Fragrance, [+/- May Contain / Peut Contenir, Ci 77891 / Titanium Dioxide, Ci 77491, Ci 77492, Ci 77499 / Iron Oxides, Ci 45410 / Red 28 Lake, Ci 15850 / Red 7, Ci 45380 / Red 22 Lake, Ci 15985 / Yellow 6 Lake, Ci 42090 / Blue 1 Lake, Ci 19140 / Yellow 5 Lake].","status"=>"1","price"=>"9","discount"=>"0","quantity"=>"41","tax"=>"21","feature"=>"","mark"=>"4"],



    ["name"=>"Moroccanoil Treatment Hair Oil 100ml","category_id"=>"  13","brand_id"=>"21","description"=>"Moroccanoil Treatment For All Hair Types Alcohol-free Unique formula rich in anti-aging argan oil and instantly absorbs into hair, enhancing shine, smoothing hair, easy to style and hold, and hold Long-lasting conditioning effect without weighing hair down
Only released in the last decade, Moroccanoil products have quickly become a global sensation with famous stars, celebrity hairstylists, film fashion stylists and fashionistas. television, the editors of leading fashion magazines love and are declared indispensable favorites of millions of women worldwide.

How to Use : Just use 2-3 drops of essential oil in the morning or after washing, hair will be smooth and shiny throughout the day. Regular use of Moroccanoil hair oil works to restore damaged, dry hair, reduce split ends and brittle hair.

Ingredient :-Argan Oil: Extremely rich in tocopherols (vitamin E), essential fatty acids, and antioxidants that hydrate and nourish the hair. Linseed Extract: Derived from flaxseed, a good source of alpha linolenic acid; an essential fatty acid that helps improve the health of hair. Cyclomethicone, Dimethicone, Argania Spinosa (Argan) Kernel Oil, Fragrance, Linum Usitatissimum (Linseed) Seed Extract, CI 26100 (Red 17), CI 47000 (Yellow 11).","status"=>"1","price"=>"33.7","discount"=>"0","quantity"=>"42","tax"=>"22","feature"=>"","mark"=>"5"],

            ["name"=>"CHANEL LES BEIGES LIP BALM","category_id"=>"4","brand_id"=>"17","description"=>"The lip balm helps to hydrate and bring out the natural color of the lips. A thin, light layer of lipstick provides comfort and an instant shine effect.
The product comes in a variety of light colors, suitable for all skin tones. The formula contains Vitamin E and moringa butter, to help nourish and protect lips. After just one use, lips will become smooth, soft, radiant with delicate natural colors.

How to Use : Use for lips. Use the product as many times as necessary. LES BEIGES LIGHT LIGHT MOISTURIZER can be used under lipstick to provide moisture and comfort, or after applying lipstick, to help enhance color.

Ingredient : Moringa butter helps to hydrate and nourish, reinforcing the natural protective film of the lips, ensuring moisture and comfort for the lips. Anti-oxidant Vitamin E derivative, protects the lips against harmful agents from the environment.","status"=>"1","price"=>"34.7","discount"=>"1","quantity"=>"43","tax"=>"23","feature"=>"","mark"=>"5"],

            ["name"=>"Laneige Lip Sleeping Mask Apple Flavor 20g Lip Sleeping Mask [Apple Lime]","category_id"=>"4","brand_id"=>"19","description"=>"Laneige Lip Sleeping Mask is one of the best-selling and most loved product lines of the high-end cosmetic brand Laneige, which helps to care for lips even during sleep, gently removing dead cells. on the lips, while moisturizing the lips to always look smooth, plump and elastic with the gentle fragrance of natural extracts. Experience the feeling of soft care lips at night with Laneige Lip Sleeping Mask with 4 fresh scents like berry, grapefruit, apple and vanilla!

How to Use : Before going to bed, use a special spatula to apply a generous amount to the lips. The next morning, gently wipe off with a cotton ball or tissue.

Ingredient :DIISOSTEARYL MALATE, HYDROGENATED POLYISOBUTENE, PHYTOSTERYL/ISOSTEARYL/CETYL/STEARYL/BEHENYL DIMER DILINOLEATE, HYDROGENATED POLY (C6-14 OLEFIN), POLYBUTENE, MICROCRYSTALLINE WAX, BUTYROSPERMUM PARKII (SHEA) BUTTER, SYNTHETIC WAX, EUPHORBIA CERIFERA (CANDELILLA) WAX, SUCROSE TETRASTEARATE TRIACETATE, ETHYLENE/PROPYLENE/STYRENE COPOLYMER, BUTYLENE/ETHYLENE/STYRENE COPOLYMER, MICA (CI 77019), FRAGRANCE, ASTROCARYUM MURUMURU SEED BUTTER, DIMETHICONE, TITANIUM DIOXIDE (CI 77891), POLYGLYCERYL-2 DIISOSTEARATE, DEHYDROACETIC ACID, METHICONE, COPERNICIA CERIFERA (CARNAUBA) WAX, SILICA, POLYGLYCERYL-2 TRIISOSTEARATE, YELLOW 10 LAKE (CI 47005), WATER, POLYHYDROXYSTEARIC ACID, BLUE 1 (CI 42090), POTASSIUM ALGINATE, GLYCERIN, PROPANEDIOL, ALCOHOL, LYCIUM CHINENSE FRUIT EXTRACT, RUBUS IDAEUS (RASPBERRY) FRUIT EXTRACT, VACCINIUM ANGUSTIFOLIUM (BLUEBERRY) FRUIT EXTRACT, COFFEA ARABICA (COFFEE) SEED EXTRACT, SAPINDUS MUKOROSSI FRUIT EXTRACT, VACCINIUM MACROCARPON (CRANBERRY) FRUIT EXTRACT, FRAGARIA CHILOENSIS (STRAWBERRY) FRUIT EXTRACT, RUBUS CHAMAEMORUS SEED EXTRACT, CHENOPODIUM QUINOA SEED EXTRACT, MAGNESIUM SULFATE, CALCIUM CHLORIDE, SODIUM HYALURONATE, BETA-GLUCAN, MANGANESE SULFATE, ZINC SULFATE, ASCORBYL GLUCOSIDE.","status"=>"1","price"=>"42","discount"=>"2","quantity"=>"46","tax"=>"26","feature"=>"","mark"=>"5"] ,


            ["name"=>"HATOMUGI Shower Gel Brightening Skin 800ml Moisturizing & Washing","category_id"=>"8","brand_id"=>"3","description"=>"HATOMUGI Moisturizing & Washing Shower Gel contains willow extract - a popular ingredient in skin care and beauty products in Japan. It is very rich in vitamins of group B, vitamin E, fatty acids ... have the ability to provide moisture to the skin more moist, and at the same time reduce the formation of wrinkles, fade brown spots, brighten and even skin tone. In addition, the proteolytic enzymes present in the seed extract can dissolve the keratin layer of the skin, thus helping to soften and hydrate the skin.

How to Use : Before going to bed, use a special spatula to apply a generous amount to the lips. The next morning, gently wipe off with a cotton ball or tissue.

Ingredient : Take an appropriate amount of Hatomugi whitening body wash in the palm of your hand or a bath sponge and apply evenly on the skin. Rinse with clean water","status"=>"1","price"=>"4.6","discount"=>"0","quantity"=>"47","tax"=>"27","feature"=>"","mark"=>"5"],

            ["name"=>"La Roche-Posay Deep Cleansing Foam For Oily Acne Skin 125ml Effaclar Deep Cleansing Foaming Cream","category_id"=>"9","brand_id"=>"4","description"=>"La Roche-Posay Effaclar Deep Cleansing Foaming Cream 125ml from La Roche-Posay cosmetic brand is a cleanser designed specifically for oily, combination, and oily skin. Sensitive is experiencing acne, clogged pores. The product is a foaming cream, which helps to deeply clean the skin daily, helps to tighten pores, bring clear skin and prevent the formation of new acne.

How to Use : Moisten skin with warm water, take an appropriate amount of product on hand, create lather, apply the product on the face, avoiding the skin around the eyes. Massage gently, then rinse with water and pat dry.
Ingredient : Water, Glycerin, Myristic Acid, Potassium Hydroxide, Glyceryl Stearate Se, Stearic Acid, Lauric Acid, Palmitic Acid, Coco-Glucoside, Tetrasodium EDTA, Parfum, Salicylic Acid.","status"=>"1","price"=>"12.6","discount"=>"0","quantity"=>"48","tax"=>"28","feature"=>"","mark"=>"5"],

            ["name"=>"Vichy Anti-Wrinkle & Firming Eye Cream 15ml Liftactiv Eyes Supreme Global Anti-Wrinkle & Firming Care","category_id"=>"35","brand_id"=>"12","description"=>"On the face, the eye area is the area of ​​premature aging and shows the most signs of age. Meanwhile, the habits of Vietnamese women often pay little attention to this sensitive skin area. With very thin skin, eyes need a specialized care product with a gentle formula. And the product Hasaki wants to introduce to you right now is Vichy's Liftactiv Eyes Anti Wrinkle & Firming Eye Care, which is very effective in helping to improve the condition of wrinkles. Deep wrinkles, lifting the flabby skin areas where the eyelids.

How to Use :Take an appropriate amount about the size of a red bean, then dab it on the skin under the eyes, then spread the cream in the following way. Gently apply to the eyelids, starting from the inner skin towards the eyelids (repeat 3 times)
Use your middle finger to glide over your eyes in the direction of the arrow. While gliding your fingers gently, press on the front of your eyes in waves. (Repeat 5 times). Keep pressing the front and back of the eyebrows, repeat continuously (repeat 5 times).

Ingredient : Aqua, Dimethicone, Hydrogenated Polyisobutene, Glycerin, Rhamnose, Cetyl Alcohol, Glyceryl Stearate, Polymethyl Methacrylate, Peg-40 Stearate, Cera Alba, Pentylene Glycol, Stearic Acid, Stearyl Alcohol, Sorbitan Tristearate, Triethanolamine, Caffeine, Sodium Dextran Sulfate, Myristyl Alcohol, Escine, Palmatic Acid, Phenoxyethanol, Adenosine, Magnesium Ascorbyl Phosphate, Tocopheryl Acetate, Poloxamer 338, Ascorbyl Glucoside, Caprylyl Glycol, Code F.I.L. B53814/2","status"=>"1","price"=>"45","discount"=>"0","quantity"=>"50","tax"=>"30","feature"=>"","mark"=>"5"],


            ["name"=>"Maybelline Concealer Pen Cushion Reduce Dark Circles 140 Honey 6ml Instant Age Rewind Eraser Dark Circles Treatment Concealer","category_id"=>"20","brand_id"=>"15","description"=>"Maybelline Instant Age Rewind Treatment Concealer is a concealer for the under-eye area with ingredients containing Haloxyl that effectively covers dark circles and puffiness, while giving vitality to the face. Besides, the product is also a concealer treatment, if you use it continuously for a long time, it also makes the dark area & eye bags become brighter, the fine wrinkles will fade. significantly.
The product has a beautiful small pen design and a transparent plastic body that makes it easy to see how much cream is left in the pen body. The soft, smooth hair head rotates to easily control the amount of cream each time, very convenient and not afraid of waste. Maybelline Instant Age Rewind Treatment Concealer with 6 color tones, in which there are 2 special tones: Neutralizer 150 (with strong yellow tone, for those with extremely clear dark circles, needing the most coverage) and Brightener (capable highlighter for under-eye area, similar to highlighter)

How to Use : Rotate the cap of the brush in the direction of the arrow and adjust the amount required. For the first time use, rotate the brush 3-4 times to spread the cream evenly on the hair. Dot the cream on the skin area to be concealed, then use your hand or brush to spread the cream from the inside to the outside. With thick dark circles, you can dot the cream 1-2 times and blend as usual.

Ingredient : G852364 1 Aqua/Water/Eau, Cyclopentasiloxane, Dimethicone, Isododecane, Glycerin, Peg-9 Polydimethylsiloxyethyl Dimethicone, Butylene Glycol, Dimethicone Crosspolymer, Nylon-12, Disteardimonium Hectorite, Cyclohexasiloxane, Peg-10 Dimethicone, Cetyl Peg/Ppg-10/1 Dimethicone, Phenoxyethanol, Sodium Chloride, Polyglyceryl-4 Isostearate, Caprylyl Glycol, Disodium Stearoyl Glutamate, Ethylhexylglycerin, Methylparaben, Lycium Barbarum Fruit Extract, Chlorphenesin, Ethylparaben, Aluminum Hydroxide, Peg-9, N-Hydroxysuccinimide, Palmitoyl Oligopeptide, Chrysin, Palmitoyl Tetr Apeptide-7. [+/- May Contain/Peut Contenir: Ci 77891/Titanium Dioxide, Ci 77491, Ci 77492, Ci 77499/Iron Oxides] F.I.L. D44980/4","status"=>"1","price"=>"5.8","discount"=>"1","quantity"=>"51","tax"=>"31","feature"=>"","mark"=>"5"],

            ["name"=>"L'Oreal Hair Color Conditioner 6.1 Smoky Brown 172ml Excellence Fashion - 6.1 Beige Medium Brown","category_id"=>"16","brand_id"=>"20","description"=>"L'Oreal Paris Excellence Fashion Hair Dye Cream 172ml from the famous French hair care brand L'Oreal Paris is a home hair dye product line, with modern & fashion-inspired tones. Inspired by the Paris fashion catwalk will bring a whole new look to your hair. In particular, Hi-Shine technology combines with nourishing ingredients to help nourish hair to become smooth, shiny and beautiful, radiant hair color.

How to Use : Rotate the cap of the brush in the direction of the arrow and adjust the amount required. For the first time use, rotate the brush 3-4 times to spread the cream evenly on the hair. Dot the cream on the skin area to be concealed, then use your hand or brush to spread the cream from the inside to the outside. With thick dark circles, you can dot the cream 1-2 times and blend as usual.

Ingredient : G852364 1 Aqua/Water/Eau, Cyclopentasiloxane, Dimethicone, Isododecane, Glycerin, Peg-9 Polydimethylsiloxyethyl Dimethicone, Butylene Glycol, Dimethicone Crosspolymer, Nylon-12, Disteardimonium Hectorite, Cyclohexasiloxane, Peg-10 Dimethicone, Cetyl Peg/Ppg-10/1 Dimethicone, Phenoxyethanol, Sodium Chloride, Polyglyceryl-4 Isostearate, Caprylyl Glycol, Disodium Stearoyl Glutamate, Ethylhexylglycerin, Methylparaben, Lycium Barbarum Fruit Extract, Chlorphenesin, Ethylparaben, Aluminum Hydroxide, Peg-9, N-Hydroxysuccinimide, Palmitoyl Oligopeptide, Chrysin, Palmitoyl Tetr Apeptide-7. [+/- May Contain/Peut Contenir: Ci 77891/Titanium Dioxide, Ci 77491, Ci 77492, Ci 77499/Iron Oxides] F.I.L. D44980/5","status"=>"1","price"=>"6.8","discount"=>"2","quantity"=>"52","tax"=>"32","feature"=>"","mark"=>"5"],

            ["name"=>"Sunplay Sunscreen Milk Prevents Darkening, Outstanding Protection 30g Super Block SPF81 PA++++","category_id"=>"7","brand_id"=>"8","description"=>"The product is the right choice for those who go to the beach because of its high water and sweat resistance, Sunplay Super Block ensures two effects of both protecting the skin and nourishing the skin when having to exercise continuously outdoors or under Water thanks to the added ingredients of Vitamin C, Vitamin E, Pro Vitamin B5, Hyaluronic Acid, effectively moisturize and nourish the skin. The solution quickly penetrates the skin, is not greasy, gives you a cool feeling on the skin, and is suitable for both face and body.

Sunplay Super Block sunscreen with extremely strong sun protection of SPF81 will protect your skin from burning, sunburn for many hours in combination with PA++++ and UVA Max Defense formula to create maximum UVA protection - anti-UV. All types of UVA rays, help prevent darkening, pigmentation, premature skin aging and avoid the risk of skin cancer.r.

How to Use : - Shake well before use. Apply the product evenly on the skin before going out in the sun. Use daily for best skin protection. After sweating a lot, reapply for better effect.

Ingredient : Cyclopentasiloxane,Water,Ethylhexyl Methoxycinnamate,Zinc Oxide, Triethylhexanoin, Butylene Glycol,Titanium Dioxide, Trimethylsiloxysilicate, Talc, Diethylamino Hydroxybenzoyl Hexyl Benzoate, Hydrated Silica, Lauryl PEG-9 Polydimethylsiloxyethyl Dimethicone, Polymethylsilsesquioxane, Panthenol, Tocopheryl Acetate, Dipotassium Glycyrrhizate, Magnesium Ascorbyl Phosphate, Sodium Hyaluronate, Hydrogen Dimethicone, 1,2-Hexanediol, Polyglyceryl-2 Triisostearate, Aluminum Hydroxide, Stearic Acid, Dimethicone Crosspolymer, Dimethicone, Triethoxysilylethyl Polydimethylsiloxyethyl Hexyl Dimethicone, Disodium EDTA, Methylparaben.","status"=>"1","price"=>"2.5","discount"=>"0","quantity"=>"53","tax"=>"33","feature"=>"","mark"=>"5"],

            ["name"=>"Vaseline Lip Balm 10g Lip Therapy Advanced Healing","category_id"=>"4","brand_id"=>"1","description"=>"Your dry lips will be soft and smooth with regular use of Vaseline Lip Therapy. Provides nutrients, gives you soft skin. It functions as both a lip balm + chapping treatment. Vaseline gives you soft, smooth lips and skin. Vaseline Lip Therapy lip balm uses a therapeutic formula to improve the protection of the lips, prevent chapped lips as well as keep the lips soft. Not only moisturizing the lips, Vaseline Lip Therapy can also act as a base layer to help isolate the lip skin from the chemicals of makeup lipstick, and at the same time help the lipstick stick to the color longer. More specifically, this lip balm is 100% free of lead and colorants, does not darken lips or dull color.

Lipstick contains antioxidants, helps protect lips from the harmful effects of the environment, helps lips not be affected by the environment and sunlight, helps lips to be nourished, plump and ruddy. Can be used day and night lip balm, helping lips not be affected by the environment and sunlight. The tube is compact and convenient, you can put it in your bag and easy to carry with you.

How to Use : When your lips are dry, you should use it regularly day and night. Use lip balm first, then apply lipstick to have a sexy, sexy lips as you want.

Ingredient : WHITE PETROLATUM, USP (100%)","status"=>"1","price"=>"2","discount"=>"0","quantity"=>"55","tax"=>"35","feature"=>"","mark"=>"5"]


        ]);
    }
}
