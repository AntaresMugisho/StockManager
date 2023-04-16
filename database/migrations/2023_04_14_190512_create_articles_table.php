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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("code")->unique()->nullable();
            $table->string("name");
            $table->mediumText("description")->nullable();
            $table->integer("unit_purchase_price");
            $table->integer("unit_selling_price");
            $table->integer("stock");
            $table->integer("minimum_stock");
            $table->boolean("active")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
