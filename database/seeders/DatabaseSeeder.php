<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Role;
use App\Models\Product;
use App\Models\TarikTunai;
use App\Models\Wallet;
use App\Models\TopUp;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create([
          "name" =>  "Minuman"
        ]);
        
        Category::create([
          "name" =>  "Makanan"
        ]);

        
        Category::create([
          "name" =>  "Stationary"
        ]);

        Role::create([
          "name" => "siswa",
        ]);

        
        Role::create([
            "name" => "bank",
        ]);

        
        Role::create([
            "name" => "admin",
        ]);

        
        Role::create([
            "name" => "kantin",
        ]);


        User::create([
            "name" => "siswa",
            "role_id" => 1,
            "password" => bcrypt("siswa123")
        ]);

        
        User::create([
            "name" => "bank",
            "role_id" => 2,
            "password" => bcrypt("bank123")
        ]);

        
        User::create([
            "name" => "admin",
            "role_id" => 3,
            "password" => bcrypt("admin123")
        ]);

        
        User::create([
            "name" => "kantin",
            "role_id" => 4,
            "password" => bcrypt("kantin123")
        ]);

        Wallet::create([
            "user_id" => 1,
            "credit" => 500000,
            "debit" => 0
        ]); 


        Product::create([
            "name" => "Es Teh",
            "category_id" => 1,
            "price" => 5000,
            "stock" => 30,
            "description" => "Es Teh Enak",
            "thumbnail" => "https://asset.kompas.com/crops/GRGOpdUcySMF4sTvMlSEpJpFcTM=/0x0:4939x3293/750x500/data/photo/2022/09/25/63300cfd403f0.jpg"
        ]);

        Product::create([
            "name" => "Bakso",
            "category_id" => 2,
            "price" => 15000,
            "stock" => 50,
            "description" => "Bakso Enak",
            "thumbnail" => "https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2023/07/25041221/ini-resep-kuah-bakso-sap-yang-mudah-dibuat-di-rumah.jpg"
        ]);

        
        Product::create([
            "name" => "Pensil",
            "category_id" => 3,
            "price" => 3000,
            "stock" => 70,
            "description" => "Pensil",
            "thumbnail" => "https://cahayamustika.com/image/cache/catalog/ATK/ALAT%20TULIS/PENSIL/Staedtler/ATK%20Terlengkap%20Malang%20Pensil%20Staedtler%20Mars%20Lumograph%20HB-500x500.jpg"
        ]);

        Product::create([
            "name" => "Es Teh Lemon",
            "category_id" => 1,
            "price" => 5000,
            "stock" => 30,
            "description" => "Es Teh Enak",
            "thumbnail" => "https://asset.kompas.com/crops/GRGOpdUcySMF4sTvMlSEpJpFcTM=/0x0:4939x3293/750x500/data/photo/2022/09/25/63300cfd403f0.jpg"
        ]);

        Product::create([
            "name" => "Bakso Mercon",
            "category_id" => 2,
            "price" => 15000,
            "stock" => 50,
            "description" => "Bakso Enak",
            "thumbnail" => "https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2023/07/25041221/ini-resep-kuah-bakso-sap-yang-mudah-dibuat-di-rumah.jpg"
        ]);

        
        Product::create([
            "name" => "Pensil HB",
            "category_id" => 3,
            "price" => 3000,
            "stock" => 70,
            "description" => "Pensil",
            "thumbnail" => "https://cahayamustika.com/image/cache/catalog/ATK/ALAT%20TULIS/PENSIL/Staedtler/ATK%20Terlengkap%20Malang%20Pensil%20Staedtler%20Mars%20Lumograph%20HB-500x500.jpg"
        ]);

        Transaction::create([
            "user_id" => 1,
            "quantity" => 2,
            "product_id" => 3,
            "status" => "not_paid",
            "order_id" => "inv-23",
            "total_price" => 6000
        ]); 
         
        // TopUp::create([
        //    "nominals" => 150000,
        //    "status" => "unconfirmed",
        //    "order_id" => "inv-23",
        //    "user_id" => 1
        // ]);

        // TarikTunai::create([
        //    "user_id" => 1,
        //    "nominals" => 50000,
        //    "status" => "unconfirmed",
        //    "order_id" => "inv-23"
        // ]); 




    }


}
