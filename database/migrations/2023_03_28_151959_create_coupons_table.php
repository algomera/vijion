<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	return new class extends Migration {
		/**
		 * Run the migrations.
		 */
		public function up(): void {
			Schema::create('coupons', function (Blueprint $table) {
				$table->id();
				$table->foreignIdFor(\App\Models\Brand::class, 'brand_id')->constrained();
				$table->integer('amount');
				$table->integer('coins');
				$table->enum('type', [
					'percentage',
					'cash'
				]);
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 */
		public function down(): void {
			Schema::dropIfExists('coupons');
		}
	};
