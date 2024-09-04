<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('address');
            $table->string('image_path')->nullable();
            $table->string('image1_path')->nullable();
            $table->string('image2_path')->nullable();
            $table->boolean('furnished');
            $table->integer('total_floors');
            $table->integer('surface');
            $table->unsignedInteger('categorie_id');
            $table->boolean('is_public')->default(false);
            $table->unsignedInteger('owner_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
