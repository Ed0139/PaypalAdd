<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop Lenovo IdeaPad',
                'description' => 'Laptop de 15.6 pulgadas con procesador Ryzen 5.',
                'price' => 14999.99,
                'stock' => 10,
                'image' => 'https://picsum.photos/300?random=1',
            ],
            [
                'name' => 'Mouse Logitech G203',
                'description' => 'Mouse gamer RGB de 8000 DPI.',
                'price' => 599.00,
                'stock' => 25,
                'image' => 'https://picsum.photos/300?random=2',
            ],
            [
                'name' => 'Teclado Mecánico Redragon',
                'description' => 'Teclado mecánico con switches rojos.',
                'price' => 1099.00,
                'stock' => 18,
                'image' => 'https://picsum.photos/300?random=3',
            ],
            [
                'name' => 'Monitor Samsung 24"',
                'description' => 'Monitor Full HD de 75 Hz.',
                'price' => 3499.00,
                'stock' => 12,
                'image' => 'https://picsum.photos/300?random=4',
            ],
            [
                'name' => 'Audífonos HyperX Cloud II',
                'description' => 'Audífonos gamer con sonido envolvente.',
                'price' => 1899.00,
                'stock' => 20,
                'image' => 'https://picsum.photos/300?random=5',
            ],
            [
                'name' => 'SSD Kingston 1TB',
                'description' => 'Unidad de estado sólido SATA.',
                'price' => 1499.00,
                'stock' => 15,
                'image' => 'https://picsum.photos/300?random=6',
            ],
            [
                'name' => 'Memoria RAM Corsair 16GB',
                'description' => 'DDR4 3200 MHz.',
                'price' => 999.00,
                'stock' => 30,
                'image' => 'https://picsum.photos/300?random=7',
            ],
            [
                'name' => 'Tarjeta Gráfica RX 6600',
                'description' => '8 GB GDDR6.',
                'price' => 5999.00,
                'stock' => 8,
                'image' => 'https://picsum.photos/300?random=8',
            ],
            [
                'name' => 'Procesador Ryzen 5 5600G',
                'description' => '6 núcleos y 12 hilos.',
                'price' => 2599.00,
                'stock' => 14,
                'image' => 'https://picsum.photos/300?random=9',
            ],
            [
                'name' => 'Fuente de Poder Corsair 650W',
                'description' => 'Certificación 80 Plus Bronze.',
                'price' => 1699.00,
                'stock' => 16,
                'image' => 'https://picsum.photos/300?random=10',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
