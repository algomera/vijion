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
        Schema::table('hero_slides', function (Blueprint $table) {
            // Visibility
            $table->dropColumn('visible');
            $table->boolean('visible_it')->default(true)->after('order');
            $table->boolean('visible_en')->default(true)->after('visible_it');

            // Paragraph
            $table->renameColumn('paragraph', 'paragraph_it');
            $table->string('paragraph_en')->nullable()->after('paragraph');

            // Button Text
            $table->renameColumn('btn_text', 'btn_text_it');
            $table->string('btn_text_en')->nullable()->after('btn_text');

            // Small Centered Text
            $table->renameColumn('small_centered_text', 'small_centered_text_it');
            $table->string('small_centered_text_en')->nullable()->after('small_centered_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hero_slides', function (Blueprint $table) {
            $table->boolean('visible')->default(1);
            $table->dropColumn('visible_it');
            $table->dropColumn('visible_en');
            $table->renameColumn('paragraph_it', 'paragraph');
            $table->dropColumn('paragraph_en');
            $table->renameColumn('btn_text_it', 'btn_text');
            $table->dropColumn('btn_text_en');
            $table->renameColumn('small_centered_text_it', 'small_centered_text');
            $table->dropColumn('small_centered_text_en');
        });
    }
};
