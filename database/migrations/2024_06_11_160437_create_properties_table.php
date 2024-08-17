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
            $table->string('owner_name');
            $table->string('owner_phone');
            $table->string('owner_email');
            $table->integer('floor_number');
            $table->boolean('furnished');
            $table->integer('total_floors');
            $table->integer('surface');
            $table->string('type');
            $table->string('label');
            $table->boolean('is_public')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
