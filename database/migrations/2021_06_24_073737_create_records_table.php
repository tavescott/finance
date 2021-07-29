<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->date('date')->nullable()->default(now());
            $table->integer('sales')->nullable()->default(0);
            $table->integer('purchases')->nullable()->default(0);
            $table->integer('expenses')->nullable()->default(0);

            $table->integer('debtors')->nullable()->default(0);
            $table->integer('creditors')->nullable()->default(0);

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
        Schema::dropIfExists('records');
    }
}
