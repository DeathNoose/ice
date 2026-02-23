<?php
// database/migrations/2024_01_01_100000_create_skates_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('skates', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('brand');
            $table->string('size');
            $table->integer('quantity')->default(0);
            $table->decimal('price_per_hour', 8, 2)->default(150);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();
            
            // Добавляем индексы
            $table->index('is_available');
            $table->index('size');
        });
    }

    public function down()
    {
        Schema::dropIfExists('skates');
    }
};