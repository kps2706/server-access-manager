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
        Schema::create('global_rules', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('code');
            $table->string('title')->nullable();
            $table->text('description');
            $table->string('severity')->nullable();
            $table->string('impact_area')->nullable();
            $table->text('recommendation')->nullable();
            $table->string('reference_link')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_rules');
    }
};
