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
        Schema::create('article_order', function (Blueprint $table) {
            $table->foreignId("order_id");
            $table->foreignId("article_id");
            $table->integer("price");
            $table->integer("quantity_ordered");
            $table->string("quantity_delivered")->nullable();
            
            $table->primary(["order_id", "article_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_order');
    }
};
