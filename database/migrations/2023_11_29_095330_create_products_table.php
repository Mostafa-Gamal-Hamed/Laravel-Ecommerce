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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name",100);
            $table->text("description");
            $table->decimal("price",8,2);
            $table->decimal("offerPrice",8,2);
            $table->string("image1",255);
            $table->string("image2",255)->nullable();
            $table->string("image3",255)->nullable();
            $table->integer("quantity");
            $table->foreignId("categoryChild_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
