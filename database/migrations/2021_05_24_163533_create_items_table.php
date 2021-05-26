<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->foreignId('unit_id')->constrained()->onDelete('cascade');
            $table->integer('unit_price');
            $table->foreignId('mini_unit_id')->constrained('units')->onDelete('cascade');
            $table->integer('mini_unit_price');
            $table->integer('mini_unit_in_unit');
            $table->integer('divisible_further');
            $table->integer('unit_quantity');
            $table->integer('mini_unit_quantity');

            $table->index('business_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
