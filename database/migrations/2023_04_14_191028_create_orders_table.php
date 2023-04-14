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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("code")->unique();
            // Articles -> many to many relation
            $table->integer("unit_purchase_price");
            $table->integer("unit_selling_price");
            $table->integer("value");
            $table->integer("supplier"); // Must be foreign key
            // Quantity & Control must be in pivo table foreach article
            $table->timestamps();
            $table->timestamp("delivered_at")->nullable();
            $table->boolean("closed")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
