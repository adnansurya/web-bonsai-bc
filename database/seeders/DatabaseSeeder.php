<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Sale;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();


        Category::create([
            'name' => 'Tanaman Aromatic',
            'description' => 'Tanaman aromatic adalah tanaman yang memiliki banyak senyawa kimia yang bersifat aromatik'
        ]);
        Category::create([
            'name' => 'Tanaman Gantung',
            'description' => 'Tanaman yang cocok untuk diletakkan di tempat yang tergantung, seperti pot gantung atau rak. Contohnya adalah potos, spider plant, dan string of pearls'
        ]);
        Category::create([
            'name' => 'Tanaman Air',
            'description' => 'Tanaman yang tumbuh di dalam air, baik dalam wadah khusus atau akuarium, seperti pakis air, anubias, dan java moss'
        ]);
        Category::create([
            'name' => 'Tanaman Langka',
            'description' => 'Tanaman yang tidak umum ditemukan namun menarik perhatian dengan keunikan dan keindahannya, seperti begonia maculata'
        ]);

        Product::create([
            'name' => 'Tanaman Bonsai',
            'description' => 'Bonsai adalah seni penempaan pohon kecil yang berasal dari Jepang. Tanaman bonsai ditanam dalam pot kecil dan dipangkas secara teratur untuk menciptakan bentuk dan proporsi yang indah. Mereka sering mewakili pohon alami yang lebih besar dan memiliki nilai estetika yang tinggi',
            'price' => 10000,
            'category_id' => 3,
            'stock' => 17,
            'image' => 'jpg',
        ]);

        Product::create([
            'name' => 'Begonia',
            'description' => 'Begonia adalah tanaman hias yang dihargai karena daunnya yang berwarna-warni dan beragam bentuknya. Begonia dapat tumbuh baik di dalam ruangan maupun di luar ruangan dengan kondisi yang tepat.',
            'price' => 210000,
            'category_id' => 4,
            'stock' => 21,
            'image' => 'jpg',
        ]);

        Product::create([
            'name' => 'Sirih Gading',
            'description' => 'Sirih gading atau pothos adalah tanaman hias yang tahan dalam berbagai kondisi cahaya dan mudah dirawat. Daunnya berbentuk hati dan memiliki pola variegata yang menarik.',
            'price' => 150000,
            'category_id' => 1,
            'stock' => 19,
            'image' => 'jpg',
        ]);
        Product::create([
            'name' => 'Krisan',
            'description' => 'Krisan adalah tanaman hias berbunga yang banyak dijumpai di Indonesia. Bunga krisan hadir dalam berbagai warna dan merupakan simbol keindahan serta keagungan.',
            'price' => 70000,
            'category_id' => 2,
            'stock' => 14,
            'image' => 'jpg',
        ]);
        Product::create([
            'name' => 'Bougenville',
            'description' => 'Bougenville adalah tanaman hias yang populer di Indonesia karena bunga berwarna-warni dan tahan terhadap iklim tropis. Tanaman ini sering digunakan sebagai tanaman pagar atau peneduh.',
            'price' => 210000,
            'category_id' => 4,
            'stock' => 4,
            'image' => 'jpg',
        ]);

        Sale::factory(30)->create();

    }
}
