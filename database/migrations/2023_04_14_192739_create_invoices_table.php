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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string("code")->unique()->nullable();
            $table->foreignId("client_id")->nullable()->constrained()->cascadeOnDelete();
            $table->integer("discount")->default(0);
            $table->integer("paid")->default(0);
            $table->timestamps();
            $table->string("status"); // Closed, Open or Alert
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
