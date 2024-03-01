<?php
                                                                            // php artisan make:migration create_comics_table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title', 128);
            $table->text('description')->nullable();
            $table->string('thumb', 1024)->nullable();
            $table->string('price', 12);
            $table->string('series', 128);
            $table->date('sale_date', 64);
            $table->string('type', 32)->nullable();
            $table->string('artists', 512)->nullable();
            $table->string('writers', 512)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};
