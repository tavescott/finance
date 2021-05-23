<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('owner_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->string('product_type');
            $table->foreignId('plan_id')->constrained();
            $table->string('ward_region');
            $table->text('b_id_type');
            $table->integer('b_id_no');
            $table->string('b_id_document')->nullable();
            $table->integer('is_verified')->default(0);

            $table->index('category_id');
            $table->index('plan_id');
            $table->index('owner_id');
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
        Schema::dropIfExists('businesses');
    }
}
