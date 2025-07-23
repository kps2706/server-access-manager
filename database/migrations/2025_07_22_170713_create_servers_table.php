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
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('hostname');
            $table->ipAddress('ip_address')->unique();
            $table->enum('zone', ['MZ', 'DMZ']);
            $table->foreignId('vendor_id')->constrained('vendors')->onDelete('cascade'); // references 'id' by default
            $table->string('os')->nullable();
            $table->enum('location', ['DC', 'DR'])->nullable();
            $table->enum('environment', ['Production', 'Staging', 'Development'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
