<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	return new class extends Migration {
		/**
		 * Run the migrations.
		 */
		public function up(): void {
			Schema::create('categories', function (Blueprint $table) {
				$table->id();
				$table->string('name')->unique();
				$table->string('slug');
				$table->string('image_path')->nullable();
				$table->integer('highlighted_spot')->nullable();
				$table->string('highlighted_title')->nullable();
				$table->string('highlighted_subtitle')->nullable();
				$table->string('highlighted_background')->nullable();
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 */
		public function down(): void {
			Schema::dropIfExists('categories');
		}
	};
