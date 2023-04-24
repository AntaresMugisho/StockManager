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
        Schema::create('article_invoice', function (Blueprint $table) {
            $table->foreignId("invoice_id")->constrained()->cascadeOnDelete();
            $table->foreignId("article_id")->constrained()->cascadeOnDelete();
            $table->integer("unit_selling_price");
            $table->integer("quantity");
            
            $table->primary(["invoice_id", "article_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_invoice');
    }
};
