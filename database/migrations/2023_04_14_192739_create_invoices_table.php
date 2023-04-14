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
            $table->string("code")->unique();
            $table->foreignId("client_id")->constrained()->cascadeOnDelete();
            // As order, must have a pivot table with articles and their details(price, ...)
            $table->integer("total");
            $table->integer("discount");
            $table->integer("paid");
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
