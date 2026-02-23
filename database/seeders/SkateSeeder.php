<?php
// database/seeders/SkateSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skate;
use Illuminate\Support\Facades\DB;

class SkateSeeder extends Seeder
{
    public function run(): void
    {
        $skates = [
            [
                'model' => 'RX5',
                'brand' => 'Bauer',
                'size' => '38',
                'quantity' => 5,
                'price_per_hour' => 150,
                'description' => 'Профессиональные хоккейные коньки, отличная поддержка голеностопа',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => 'RX5',
                'brand' => 'Bauer',
                'size' => '39',
                'quantity' => 4,
                'price_per_hour' => 150,
                'description' => 'Профессиональные хоккейные коньки, отличная поддержка голеностопа',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => 'RX5',
                'brand' => 'Bauer',
                'size' => '40',
                'quantity' => 6,
                'price_per_hour' => 150,
                'description' => 'Профессиональные хоккейные коньки, отличная поддержка голеностопа',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => 'RS',
                'brand' => 'CCM',
                'size' => '41',
                'quantity' => 3,
                'price_per_hour' => 150,
                'description' => 'Удобные коньки для любителей, анатомическая колодка',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => 'RS',
                'brand' => 'CCM',
                'size' => '42',
                'quantity' => 4,
                'price_per_hour' => 150,
                'description' => 'Удобные коньки для любителей, анатомическая колодка',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => 'RS',
                'brand' => 'CCM',
                'size' => '43',
                'quantity' => 3,
                'price_per_hour' => 150,
                'description' => 'Удобные коньки для любителей, анатомическая колодка',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => 'Elite',
                'brand' => 'Graf',
                'size' => '44',
                'quantity' => 2,
                'price_per_hour' => 150,
                'description' => 'Фигурные коньки высокого качества, термоформируемые',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => 'Elite',
                'brand' => 'Graf',
                'size' => '45',
                'quantity' => 2,
                'price_per_hour' => 150,
                'description' => 'Фигурные коньки высокого качества, термоформируемые',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => 'Classic',
                'brand' => 'Nordway',
                'size' => '36',
                'quantity' => 4,
                'price_per_hour' => 120,
                'description' => 'Бюджетный вариант для новичков, детские размеры',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => 'Classic',
                'brand' => 'Nordway',
                'size' => '37',
                'quantity' => 4,
                'price_per_hour' => 120,
                'description' => 'Бюджетный вариант для новичков, детские размеры',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => 'Pro',
                'brand' => 'Bauer',
                'size' => '42',
                'quantity' => 2,
                'price_per_hour' => 200,
                'description' => 'Профессиональная модель премиум-класса, carbon',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'model' => 'Comfort',
                'brand' => 'CCM',
                'size' => '43',
                'quantity' => 3,
                'price_per_hour' => 150,
                'description' => 'Повышенный комфорт и поддержка, мягкий валенок',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($skates as $skate) {
            Skate::create($skate);
        }
        
        $this->command->info('Коньки успешно добавлены!');
    }
}