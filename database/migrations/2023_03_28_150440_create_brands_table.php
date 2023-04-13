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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
			$table->string('name')->unique();
	        $table->string('slug');
			$table->string('logo_path')->nullable();
			$table->foreignIdFor(\App\Models\Category::class, 'category_id')->constrained();
			$table->boolean('our_brand')->default(0);
	        $table->boolean('unmissable')->default(0);
			$table->boolean('week_offer')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
