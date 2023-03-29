<?php

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
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->id();
			$table->string('paragraph')->nullable();
			$table->string('btn_text')->nullable();
			$table->string('btn_url')->nullable();
	        $table->string('small_centered_text')->nullable();
	        $table->string('big_centered_text')->nullable();
	        $table->string('coins_centered_text')->nullable();
			$table->string('background_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_slides');
    }
};
