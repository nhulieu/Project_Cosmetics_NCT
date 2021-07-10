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
            ["fname"=>"Cang","lname"=>"Trinh","email"=>"trinhvancang92@gmail.com","username"=>"Cang Trinh","password"=>"123","address"=>"123 Nguyen Trai","phone"=>"0962382911", "type"=>"1"],
            ["fname"=>"Tai","lname"=>"Ngo","email"=>"taingo@gmail.com","username"=>"Tai Ngo","password"=>"123","address"=>"456 Nguyen Trai","phone"=>"0988777999", "type"=>"2"],
            ["fname"=>"Nhu","lname"=>"Lieu","email"=>"lieunhu@gmail.com","username"=>"Lieu Nhu","password"=>"123","address"=>"789 Nguyen Trai","phone"=>"0999888666", "type"=>"2"],
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
            ["product_id" => "20", "path" => "img/Product_Photo/20. Moroccanoil/3.jpg"]
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
            ["name"=>"VASELINE Body Lotion Healthy White UV","category_id"=>"5","brand_id"=>"1","description"=>"Vaseline Healthy White Lightening Lotion is a moisture restoring formula that is enriched with Vitamin B3 and Triple Sunscreens to protect skin damage due to sun exposure. It works by inhibiting the melanin transfer so there is lesser wrinkle, uneven skin tone, and dark spots on the skin.How to Use : Apply Vaseline Healthy White Lightening Lotion  to your hand and spread across your body until absorbed. Use twice a day for best results. Apply thoroughly to avoid product rubbing off on clothes.Ingredient : Water, Isopropyl Myristate, Stearic Acid, Glyceryl Stearate, Mineral Oil, Ethylhexyl Methoxycinnamate, Glycerin, Niacinamide, Butyl Methoxydibenzoylmethane, Titanium dioxide, Sodium Ascorbyl Phosphate, Tocopheryl Acetate, Glutathione, Cystine, Glycine, Petrolatum, Dimethicone, Carbomer, Cetyl alcohol, Perfume, Triethanolamine, Potassium Hydroxide, Sodium PCA, Aluminum Hydroxide, BHT, Disodium EDTA, Phenoxyethanol, Methylparaben, Propylparaben","status"=>"1","price"=>"140000","discount"=>"10","quantity"=>"2","tax"=>"10","feature"=>"feature 1","mark"=>"1"]	,
            ["name"=>"Bioderma Refreshing Feeling - for Sensitive","category_id"=>"6","brand_id"=>"6","description"=>"Sensibio H2O is a cleansing and makeup removing micellar water for sensitive skin. Made up of micelles with excellent cleansing and makeup removing properties, Sensibio H2O cleanses the face in the morning and evening, thus helps to prevent pollutants likely to exacerbate skin sensitivity from penetrating the skin.

How to Use : Soak a cotton pad with Sensibio H2O. Gently cleanse and/or remove makeup from your face and eyes.For longwear or heavy makeup, allow the cotton pad sit on eyelids for a few seconds.Don't forget the neck area. No rinsing required.Follow with Sensibio Lotion.

Ingredient : WATER (AQUA), PEG-6 CAPRYLIC/CAPRIC GLYCERIDES, CUCUMIS SATIVUS (CUCUMBER) FRUIT EXTRACT, MANNITOL, XYLITOL, RHAMNOSE, FRUCTOOLIGOSACCHARIDES, PROPYLENE GLYCOL, DISODIUM EDTA, CETRIMONIUM BROMIDE. ","status"=>"1","price"=>"450000","discount"=>"11","quantity"=>"6","tax"=>"5","feature"=>"feature 2","mark"=>"2"]	,
            ["name"=>"Sunplay Skin Aqua Tone Up UV Essence","category_id"=>"7","brand_id"=>"8","description"=>"Tone Up UV Essence by Skin Aqua is face and body Japanese sunscreen that was released in 2018. Resistant to water and sweat. Double as a makeup base. Removable with face wash or soap.

How to Use : Apply the sunscreen evenly over face or body. Reapply regularly especially after sweat or towelling dry to ensure maximum effectiveness. To remove, wash and rinse thoroughly with soap. Replace cap immediately after use.

Ingredient : Water, Ethylhexyl Methoxycinnamate, Butylene Glycol, Diphenylsiloxy Phenyl Trimethicone, Titanium Dioxide, Diethylamino Hydroxybenzoyl Hexyl Benzoate, Sodium Hyaluronate, Magnesium Ascorbyl Phosphate, Passiflora Edulis Fruit Extract, Hydrolyzed Prunus Domestica, Rosa Roxburghii Fruit Extract, Bis-PEG-18 Methyl Ether Dimethyl Silane, Methyl Methacrylate/Glycol Dimethacrylate Crosspolymer, Bis-Ethylhexyloxyphenol Methoxyphenyl Triazine, Acrylates Copolymer, Polysorbate 60, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Triethanolamine, Ammonium Acryloyldimethyltaurate/VP Copolymer, Silica, PEG-12 Dimethicone, Polystyrene, Polyvinyl Alcohol, Disodium EDTA, Xantham Gum, Alumina, Butylated Hydroxytoluene, Polyglyceryl-2 Triisostearate, Synthetic Fluorphlogopite, Tin Oxide, CI 73360, CI 42090, Fragrance.","status"=>"1","price"=>"179000","discount"=>"12","quantity"=>"1","tax"=>"2","feature"=>"feature 3","mark"=>"3"]	,
            ["name"=>"superstay 24h full coverage foundation","category_id"=>"12","brand_id"=>"15","description"=>"Winner of Allure's Best of Beauty Award, the Maybelline Super Stay® Full Coverage Foundation Makeup delivers 24-hour wear for concentrated coverage and a flawless finish that doesn't fade or shift all day.

How to Use : Apply to the face and blend with fingertip, sponge, or Maybelline Blender.

Ingredient : CYCLOPENTASILOXANE,
AQUA / WATER, POLYPROPYLSILSESQUIOXANE,
ISODODECANE,DIMETHICONE,
C30-45 ALKYLDIMETHYLSILYL POLYPROPYLSILSESQUIOXANE,
PEG-10 DIMETHICONE, GLYCERIN,
SILICA, DIMETHICONE/POLYGLYCERIN-3 CROSSPOLYMER, SODIUM CHLORIDE, NYLON-12, PHENOXYETHANOL,
DISTEARDIMONIUM HECTORITE,
DISODIUM STEAROYL GLUTAMATE,
CYCLOMETHICONE,CHLORPHENESIN,ETHYLPARABEN,DISODIUM EDTA, ACRYLONITRILE/METHYL METHACRYLATE/VINYLIDENE CHLORIDE COPOLYMER,
ALUMINUM HYDROXIDE ,DIPROPYLENE GLYCOL,ISOBUTANE,
PARAFFIN, SODIUM CITRATE,
TOCOPHEROL, ISOPROPYL ALCOHOL,
[+/- MAY CONTAIN CI 77891 / TITANIUM DIOXIDE, CI 77491, CI 77492, CI 77499 / IRON OXIDES ] G854042","status"=>"1","price"=>"173000","discount"=>"10","quantity"=>"2","tax"=>"5","feature"=>"feature 4","mark"=>"4"]	,
            ["name"=>"The Face Shop Ink Gel Slim Pencil Eyeliner","category_id"=>"9","brand_id"=>"13","description"=>"The thin and light 1.5mm pencil helps to draw the eye line distinctively and naturally.
With gel touch formula which helps drawing a smooth and clean eye line.
Power Defense Polymer can block the water and sebum which can let the eye makeup last for longer hours.

How to Use : Draw a smooth eye line on the eyelashes. Wait 10-20 seconds to dry for a better fitting performance. The pencil may be broken if the contents is came out too much, spin for 1mm long to use is recommended.

Ingredient : Trimethylsiloxysilicate, Dimethicone, Polyethylene, Acrylates/Stearyl Acrylate/Dimethicone Methacrylate Copolymer, Iron Oxide Black (CI 77499), Mica (CI 77019), Caprylyl Glycol, Glyceryl Caprylate, Ceresin, Isohexadecane, Carnauba Wax, Synthetic Wax, Methyl Trimethicone, Triethoxycaprylylsilane","status"=>"1","price"=>"259000","discount"=>"15","quantity"=>"2","tax"=>"5","feature"=>"feature 5","mark"=>"5"]	,
            ["name"=>"Makeup Voluminous Waterproof Mascara","category_id"=>"22","brand_id"=>"20","description"=>"Volumizing And Lengthening Mascara: This volumizing and lengthening mascara delivers a full lash fringe that’s feathery soft, with no flaking, no smudging, and no clumping; Just voluptuous volume and intense length
L'Oreal Paris Mascara: Get the long, full eyelashes you love with our best mascaras and primers; Choose from our innovative volumizing formulas and variety of brushes
Create you perfect eye makeup look with our collection of Voluminous mascaras, achieve sleek lines with smudge proof eyeliner, define your brows and discover eye shadow palettes with shades made for every eye color
Because You're Worth It: L'Oreal Paris Makeup helps you create the look you want with our full line of makeup including foundations, concealers, highlighter makeup, brow pencils, eyeshadow palettes, lipsticks and much more
Perfect To Pair With: L'Oreal Paris Infallible Never Fail Mechanical Pencil Eyeliner; With long-lasting, fade-proof color, Infallible Never Fail Eyeliner ensures your look stays put for up to 16 hours

How to Use : Place brush at base of lashes and gently sweep up to tip. Removes easily with waterproof eye makeup remover.

Ingredient : G787979 ISODODECANE CERA ALBA / BEESWAX / CIRE DABEILLE COPERNICIA CERIFERA CERA / CARNAUBA WAX / CIRE DE CARNAUBA DISTEARDIMONIUM HECTORITE DILINOLEIC ACID/BUTANEDIOL COPOLYMER AQUA / WATER / EAU ALLYL STEARATE/VA COPOLYMER ORYZA SATIVA CERA / RICE BRAN WAX PARAFFIN ALCOHOL DENAT. POLYVINYL LAURATE VP/EICOSENE COPOLYMER PROPYLENE CARBONATE TALC SYNTHETIC BEESWAX ETHYLENEDIAMINE/STEARYL DIMER DILINOLEATE COPOLYMER PEG-30 GLYCERYL STEARATE CANDELILLA CERA / CANDELILLA WAX / CIRE DE CANDELILLA PANTHENOL PENTAERYTHRITYL TETRA-DI-T-BUTYL HYDROXYHYDROCINNAMATE BHT [+/- MAY CONTAIN / PEUT CONTENIR CI 77499 / IRON OXIDES CI 77891 / TITANIUM DIOXIDE ] B195341/1","status"=>"1","price"=>"250000","discount"=>"10","quantity"=>"4","tax"=>"3","feature"=>"feature 6","mark"=>"4"]	,
            ["name"=>"Neo Cushion Glow #23N from LANEIGE","category_id"=>"13","brand_id"=>"18","description"=>"Neo Cushion Glow from LANEIGE —For clear skin and beautifully shine 24 hours, a new cushion reform ready in your hand. 360 degree light diffusion with Liquid Diamond ™ technology that combines fine micro diamond powder help your face look bright and radiant. The skin does not drop during the day. With True Color Solution ™ technology, the skin is radiant all day long. (Prevents Dullness for 12 Hours) Bright, radiant skin for 24 hours with 5.7 times more moisturizing ingredients, keeping your skin hydrated all day long.

How to Use : Choose a shade that fits your skin tone over the face. And use a brighter shade for highlighting the T-Zone (forehead and nose)

Ingredient :Water, Titanium Dioxide (CI 77891), Cyclopentasiloxane, Methyl Trimethicone , Ethylhexyl Methoxycinnamate, etc.","status"=>"1","price"=>"808000","discount"=>"0","quantity"=>"5","tax"=>"5","feature"=>"feature 7","mark"=>"3"]	,
            ["name"=>"L'absolu Rouge Cream Lipstick - 132 Caprice","category_id"=>"1","brand_id"=>"16","description"=>"Lancôme L'Absolu Rouge Lipstick Cream - 132 Caprice is a elegant and classic lipstick that keeps the lips beautiful and ready to kiss all day. This lipstick not only gives a beautiful look, but also works nurturing . The creamy and silky soft formula is enriched with hyaluronic acid, which adds a lot of moisture . In addition, the formula also contains Pro-Xylane, which is Lancôme's unique molecule, which means that the lips continue to stay supple, smooth and full .

The lipstick holster opens easily and elegantly with a single click at the bottom. This allows you to put Lancôme L'Absolu Rouge Lipstick Cream in your bag with a clear conscience and take it with you everywhere, without having to worry about the lid falling off.

How to Use :- Apply on clean and dry lips as needed

Ingredient : Pentaerythrityl Isostearate/Caprate/Caprylate/Adipate , Macadamia Ternifolia Seed Oil , Octyldodecyl Stearate , Peg-45/Dodecyl Glycol Copolymer , Cera Microcristallina / Microcrystalline Wax , Polyglyceryl-3 Beeswax , Paraffin , Hydrogenated Castor Oil Dimer Dilinoleate , Bis-Diglyceryl Polyacyladipate-2 , Alumina , Synthetic Wax , Tin Oxide , Aqua / Water , Calcium Aluminum Borosilicate , Calcium Sodium Borosilicate , Methicone , Silica , Aluminum Hydroxide , Magnesium Silicate ,Colophonium / Rosin , Propylene Glycol , Hydroxypalmitoyl Sphinganine , Hydroxypropyl Tetrahydropyrantriol , Synthetic Fluorphlogopite , Disteardimonium Hectorite , Tocopheryl Acetate , Pentaerythrityl Tetra-Di-T-Butyl Hydroxyhydrocinnamate , Geraniol , Methyl-2-Octynoate , Hydroxycitronellal , Citronellol , Hexyl Cinnamal , Benzyl Alcohol , Parfum / Fragrance , [+/- May Contain Ci 15850 / Red 6 , Ci 15850 / Red 7 , Ci 15850 / Red 7 Lake , Ci 15985 / Yellow 6 Lake , Ci 17200 / Red 33 Lake , Ci 19140 / Yellow 5 Lake , Ci 42090 / Blue 1 Lake , Ci 45380 / Red 22 Lake , Ci 45410 / Red 28 Lake , Ci 75470 / Carmine , Ci 77120 / Barium Sulfate , Ci 77491, Ci 77492, Ci 77499 / Iron Oxides , Ci 77742 / Manganese Violet , Ci 77891 / Titanium Dioxide , Mica ]
","status"=>"1","price"=>"900000","discount"=>"0","quantity"=>"6","tax"=>"10","feature"=>"feature 8","mark"=>"5"]	,
            ["name"=>"EFFACLAR GEL FACIAL WASH FOR OILY SKIN","category_id"=>"31","brand_id"=>"11","description"=>"PURIFYING FOAMING GEL CLEANSER FOR OILY SKIN: This gentle facial wash for oily skin with zinc pidolate effectively cleanses away dirt and oil while respecting skin's pH balance. Cleanses and purifies skin without overdrying. Tested on acne-prone skin (non comedogenicity test).


How to Use : Use as a daily face wash for oily skin
Cleanse morning and/or evening
Wet face with lukewarm water and apply small amount of gel, massaging the skin gently to form a rich lather
Rinse thoroughly with water

Ingredient : WATER • SODIUM LAURETH SULFATE • PEG-8 • COCO-BETAINE • HEXYLENE GLYCOL • SODIUM CHLORIDE • PEG-120 METHYL GLUCOSE DIOLEATE • ZINC PCA • SODIUM HYDROXIDE • CITRIC ACID • SODIUM BENZOATE • PHENOXYETHANOL • CAPRYLYL GLYCOL • PARFUM/FRAGRANCE.
","status"=>"1","price"=>"345000","discount"=>"5","quantity"=>"8","tax"=>"5","feature"=>"feature 9","mark"=>"3"]	,
            ["name"=>"L'Oreal Paris Wear Powder Foundation","category_id"=>"23","brand_id"=>"20","description"=>"Want lasting coverage with a matte finish? Create a flawless finish with NEW Infallible 24H freshwear foundation in a powder by L'Oreal Paris. A one-step foundation in a powder that gives you the lasting coverage of a liquid foundation yet mattifies like a powder, for flawless skin that looks fresh hour after hour.  Water, sweat and heat resitant. A longwear powder that stays put all day, with up to 24H wear. Discover the rest of the Infallible range (including our much loved 24h Freshwear foundation and our More Than Concealer), for the ultimate longwear makeup regime.

How to Use :Use brush/sponge to apply all over face. Build as needed.

Ingredient : Talc, Zinc Stearate, Dimethicone, Zea Mays Starch/Corn Starch, Caprylic/Capric Triglyceride, Silica, Dimethicone/Vinyl Dimethicone Crosspolymer, Triethoxycaprylylsilane, Caprylyl Glycol, Ethylhexylglycerin, Potassium Sorbate, Parfum/Fragrance, Isoceteth-10, Alaria Esculenta Extract, Hexyl Cinnamal, Benzyl Salicylate, Linalool, Alpha-Isomethyl Ionone, Benzyl Alcohol, Citronellol, Tocopherol, [+/- May Contain / Peut Contenir CI 77891 / Titanium Dioxide CI 77491, CI 77492, CI 77499 / Iron Oxides, Mica CI 19140 / Yellow 5 Lake CI 77007 / Ultramarines CI 15850 / Red 7 Lake].","status"=>"1","price"=>"358000","discount"=>"6","quantity"=>"7","tax"=>"5","feature"=>"feature 10","mark"=>"4"]	,
            ["name"=>"Innisfree Super Volcanic Pore Clay Mask 2X","category_id"=>"36","brand_id"=>"14","description"=>"This 10-in-1 clay mask by Innisfree is formulated with Jeju Volcanic Cluster Sphere that features twice more powerful adherence to sebum for intensive pore care. It tightens pores and controls sebum production sebum while gently exfoliating to remove blackheads. This volcanic clay mask deeply cleanses the skin leaving it with a cooling effect and a softer, brighter and firm looking skin.

How to Use After washing your face, apply the Jeju Volcanic Clay Mask evenly on the face except the eye and lip area. Let stand 10 minutes and then clean the face with a massage with water.

Ingredient : Water / Aqua / Eau, Titanium Dioxide (Ci 77891), Butylene Glycol, Volcanic Ash, Glycerin, Silica, Trehalose, Caprylic/Capric Triglyceride, Kaolin, Bentonite, Polyvinyl Alcohol, Glyceryl Stearate, Stearic Acid, Cetearyl Alcohol, 1,2-Hexanediol, Pvp, Peg-100 Stearate, Polysorbate 60, Iron Oxides (Ci 77499), Hydrogenated Vegetable Oil, Xanthan Gum, Juglans Regia (Walnut) Shell Powder, Lactic Acid/Glycolic Acid Copolymer, Sorbitan Stearate, Zea Mays (Corn) Starch, Polyacrylate-13, Polysorbate 20, Mannitol, Dextrin, Theobroma Cacao (Cocoa) Extract, Microcrystalline Cellulose, Lactic Acid, Polyisobutene, Menthoxypropanediol, Tetrasodium Pyrophosphate, Disodium Edta, Ethylhexylglycerin, Sorbitan Isostearate, Aluminum Hydroxide, Triethoxycaprylylsilane, Tocopherol","status"=>"1","price"=>"260000","discount"=>"5","quantity"=>"4","tax"=>"5","feature"=>"","mark"=>"3"]	,
            ["name"=>"Hatomugi Body Lotion 400ml Body Milk","category_id"=>"5","brand_id"=>"3","description"=>"Hatomugi Body Milk Body Milk is a body lotion from the Japanese cosmetic brand Hatomugi, with ingredients extracted from willow seeds to maintain skin moisture, bring moist skin, soften skin. and effective whitening.

How to Use : Take an appropriate amount of body lotion and spread it all over the body. Gently massage until the essence is fully absorbed into the skin.

Ingredient : Water, glycerin, coix seed extract, Squalane, hyaluronic acid Na, carbomer, betaine, dimethicone, steareth - 6, EDTA-4Na, hydroxide Na, phenoxyethanol, mineral oil, BG, benzoic acid Na, methylparaben, fragrance.
","status"=>"1","price"=>"139000","discount"=>"10","quantity"=>"4","tax"=>"5","feature"=>"","mark"=>"4"]	,
            ["name"=>"VITALUMIÈRE AQUA - CHANEL","category_id"=>"17","brand_id"=>"17","description"=>"With a soft, water-light texture and light-to-medium coverage, the tiniest drop of this hybrid fluid foundation creates a natural-looking glow. Skin looks refined and feels refreshed, for an exquisite makeup experience.

How to Use : Shake before use. Gently pat, dab or stipple with brush onto entire face — or key areas— and blend from the center of the face outward.

Ingredient : OCTINOXATE  6 % , TITANIUM DIOXIDE  5.6 % , OTHER INGREDIENTS , water , methyl trimethicone , alcohol , dimethicone , phenyl trimethicone , butylene glycol , talc , isododecane , polymethylsilsesquioxane , acrylates/polytrimethylsiloxymethacrylate copolymer , polymethyl methacrylate , nelumbo nucifera flower water , PEG-10 dimethicone , alumina , dimethicone/PEG-10/15 crosspolymer , stearic acid , aluminum hydroxide , phenoxyethanol , magnesium sulfate , fragrance , triethoxycaprylylsilane , methylparaben , sodium hyaluronate , tocopheryl acetate , dipropylene glycol , polyurethane-15 , BHT , laminaria digitata extract , tocopherol , propylparaben , ethylparaben , [+ / - (MAY CONTAIN) , ultramarines , iron oxides , titanium dioxide , mica , IL18A-I
","status"=>"1","price"=>"115000","discount"=>"5","quantity"=>"6","tax"=>"5","feature"=>"","mark"=>"3"]	,
            ["name"=>"Nivea Lip Balm Strawberry Flavor 4.8g","category_id"=>"4","brand_id"=>"4","description"=>"Nivea Caring Lip Balm is a line of lip care products from the famous Nivea cosmetic brand originating from Germany, with a lead-free formula that is safe for sensitive lip skin, helping to provide professional moisture. deeply keeps the skin of the lips soft and smooth.

How to Use : Apply lip balm to your lips at any time of the day or when you feel your lips are dry, flaky, lifeless. You can apply lip balm before going to bed to keep your lips soft and not dehydrated.

Ingredient : Ricinus Communis Seed Oil, Polyisobutene, Octyldodecanol, Pentaerythrityl Tetraisostearate, Hydrogenated Polydecene, Candelilla Cera, Butyrospermum Parkii Butter, Cera Microcristallina, Isopropyl Palmitate, Synthetic Wax, Polyglyceryl-3 Diisostearate, Glycerin, Glyceryl Glucoside, Aqua, Fragaria Ananassa Fruit Juice, Mica, Propylene Glycol, BHT, Aroma, CI 15985, CI 77891, CI 15850","status"=>"1","price"=>"63000","discount"=>"10","quantity"=>"10","tax"=>"5","feature"=>"","mark"=>"4"]	,
            ["name"=>"Vichy Aqualia Thermal Cream-Gel","category_id"=>"35","brand_id"=>"12","description"=>"Gel Vichy Aqualia Thermal Rehydrating Cream-Gel belongs to the intensive moisturizing Aqualia Thermal product line from Vichy cosmetic brand, with ingredients Vichy mineral water & Hyaluronic Acid, Sodium PCA, Mannose... to help provide instant moisture. and long-lasting for the skin, minimizing water loss, giving you soft, moist skin for up to 48 hours, while supporting the recovery and nourishment of healthy skin from deep within.

How to Use : Use after applying essence. Take an amount of cream the size of a grain of corn, dot 5 points: forehead, nose, chin and cheeks. Apply from the inside out, from top to bottom.


Ingredient :  Aqua / Water, Glycerin, Alcohol Denat, Caprylic/Capric Triglyceride, Mannose, Carbomer, Sodium Pca, Salicylic Acid, Sodium Hydroxide, Sodium Hyaluronate, Limnanthes Alba Seed Oil / Meadowfoam Seed Oil, Caprylyl Glycol, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Parfum / Fragrance.","status"=>"1","price"=>"150000","discount"=>"11","quantity"=>"15","tax"=>"5","feature"=>"","mark"=>"4"]	,
            ["name"=>"Bioré Lotion SPF UV Face Milk","category_id"=>"5","brand_id"=>"7","description"=>"Oily skin girls are often afraid to apply sunscreen because they do not like the greasy, secretive feeling that sunscreen brings. In addition, when sweat is washed away, sunscreen is no longer effective, so many women skip this extremely important skin protection step. Then Bioré's Face Milk SPF50+/PA++++ - a specialized sunscreen for oily skin girls is the choice you cannot ignore.


How to Use : Shake well, take an appropriate amount, spread evenly over the skin surface before going out into the sun. For better results, reapply after sweating or swimming for a long time in water. Biore cleanser or makeup remover can be used to clean.

Ingredient :  Ethylhexyl Methoxycinnamate 5.0%, Cyclopentasiloxane 25.7%, Zinc Oxide 12.0%, Lauryl Methacrylate/Sodium Methacrylate Crosspolymer 6.0%, Titanium Dioxide 0.47%, Cyclomethicone, Dimethicone, Alcohol, Water, Lauryl Methacrylate/Sodium Methaxcrylate Crosspolymer, Talc, Glycerin,Titanium Dioxide, Methicone, Mica, Polysilicone-9, Peg-12 Dimethicone, Peg-3 Dimethicone, Cetyl-Pg Hydroxyethyl Palmitamide, Aluminum Hydroxide, Silica, Iron Oxides (Ci 73360), Bht, Barium Sulfate, Aluminum Dimyristate..","status"=>"1","price"=>"75000","discount"=>"5","quantity"=>"16","tax"=>"5","feature"=>"","mark"=>"4"]	,
            ["name"=>"SENKA Brightening Serum","category_id"=>"34","brand_id"=>"22","description"=>"Skin care is an almost daily routine for women. And one of the ways to increase the effectiveness of your whole skin care process is to invest in a good bottle of skin essence. White Beauty Serum from SENKA brand helps to reduce melanin pigmentation, dark spots, dark spots and freckles, while supporting smooth, clear and moist skin. The product is now available at Hasaki.

How to Use : Wash your face and moisturize with rose water, then take out a sufficient amount of Senka White Beauty Serum in your hand, gently and evenly spread over the entire face, apply more concentratedly on the areas of skin with pigmentation.

Ingredient : Natural ingredients such as rice bran, honey, essence from white silkworm cocoons, rice germ oil, sericin, hydrolyzed silk, wormwood extract, white Mayumi essence are safe and benign.
","status"=>"1","price"=>"168000","discount"=>"5","quantity"=>"5","tax"=>"5","feature"=>"","mark"=>"4"]	,
            ["name"=>"Bourjois Lipstick Pink 12 Beau","category_id"=>"2","brand_id"=>"19","description"=>"Bourjois Rouge Edition Velvet Lipstick is a lipstick line that is praised by famous bloggers around the world as a liquid lipstick – creamy lipstick – “The Best Liquid Lipstick”! Bourjois lipstick palette is beautiful, delicate, diverse in application colors, has a light and velvety texture, many outstanding colors make you feel natural and comfortable, helping to bring makeup results unexpected and durable for many hours.

How to Use : If you want a light color, you can dot the color on your lips and then use your hands to blend it, if you want a more vibrant color, you can use a brush to blend it directly on your lips.

Ingredient : Dimethicone, Dimethicone/Vinyl Dimethicone Crosspolymer, Butyl Acrylate/Hydroxypropyl Dimethicone Acrylate Copolymer, Trimethylsiloxysilicate, Parfum/Fragrance, Silica, Isoceteth-10, Alumina, Alpha-Isomethyl Ionone, Linalool, Citronellol, Geraniol.","status"=>"1","price"=>"199000","discount"=>"5","quantity"=>"30","tax"=>"5","feature"=>"","mark"=>"5"]	,
            ["name"=>"Paula's Choice Moisturizing","category_id"=>"35","brand_id"=>"10","description"=>"Paula's Choice Calm Restoring Moisturizer Normal To Oily/Combination is a Paula's Choice brand of moisturizer for normal to oily skin and sensitive skin. Specially formulated with ultra-gentle emollient complexes that quickly hydrate sensitive skin, and natural plant extracts to soothe skin, reduce redness and irritation, and aid in skin repair. effective. The gel texture is smooth, non-sticky, does not irritate the skin.

How to Use : Calm Restoring Moisturizer Normal to Oily/Combination is ideal for smoothing the face and neck area.
After completing the previous skin care steps, you use a small amount that is enough for the entire face.
If used during the day, need to be combined with a sunscreen containing SPF 30 or higher.

Ingredient : Water (Aqua), Cyclopentasiloxane (hydration), Glycerin (skin replenishing), Butylene Glycol (hydration), Bis-Phenylpropyl Dimethicone (hydration), Glycyrrhiza Glabra (Licorice) Root Extract, Allantoin (skin-soothing), Beta-Glucan (skin-soothing/antioxidant), Dipotassium Glycyrrhizate (skin-soothing), Epilobium Angustifolium Flower/Leaf/Stem Extract (willow herb extract/skin-soothing), Phenyl Trimethicone (hydration), Dimethicone (hydration), Dimethicone/Vinyl Dimethicone Crosspolymer (texture-enhancing), Sodium Hyaluronate (hydration/skin replenishing), Arctium Majus Root Extract (burdock extract/skin-soothing), Camellia Sinensis Leaf Extract (green tea/skin-soothing/antioxidant), Laminaria Saccharina Extract (algae extract/hydration/skin-soothing), Vitis Vinifera Seed Extract (grape extract/antioxidant), Panthenol (skin replenishing), Sodium Acrylate/Sodium Acryloyldimethyl Taurate Copolymer (texture-enhancing), Hydroxyethylcellulose (texture-enhancing), Isohexadecane (texture-enhancing), Sodium Carbomer (texture-enhancing), Polysorbate 80 (texture-enhancing), Ethylhexylglycerin (preservative), Phenoxyethanol (preservative).","status"=>"1","price"=>"980000","discount"=>"0","quantity"=>"20","tax"=>"5","feature"=>"","mark"=>"4"]	,
            ["name"=>"Moroccanoil Moisture Repair","category_id"=>"9","brand_id"=>"21","description"=>"Moroccanoil Moisture Repair Shampoo (Moroccanoil Moisture Repair Shampoo): gently cleanses while improving hair health, helping to repair damage caused by chemical and heat treatments. Formulated with antioxidant-rich Argan oil, natural plant extracts and keratin proteins, it restores elasticity, nourishes dry hair and repairs damaged hair. Free of sulfates, phosphates and parabens, Moroccanoil Moisture Repair Shampoo is color-safe and leaves your hair shiny, healthy and manageable.

How to Use : Take Moroccanoil Moisture Repair Shampoo into your hand and apply evenly to wet hair and scalp, massaging gently. Keep adding water to create more thick foam in the super concentrated formula. Rinse thoroughly with clean water. Wash a second time if needed.

Ingredient :Argan Oil:
Lavender, Rosemary, Chamomile and Jojoba Extracts:
Cocamide Mea:
Keratin:","status"=>"2","price"=>"550000","discount"=>"5","quantity"=>"8","tax"=>"5","feature"=>"","mark"=>"5"]
        ]);
    }
}
