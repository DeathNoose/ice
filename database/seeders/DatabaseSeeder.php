<?php
// database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            SkateSeeder::class,
            // BookingsTableSeeder::class, // раскомментируйте если нужны тестовые бронирования
            // TicketsTableSeeder::class,   // раскомментируйте если нужны тестовые билеты
        ]);
        
        $this->command->info('Все сидеры успешно выполнены!');
    }
}