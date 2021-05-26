<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->foreignId('unit_id')->constrained()->onDelete('cascade');
            $table->foreignId('common_expense_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name')->nullable();
            $table->integer('amount');
            $table->date('date')->nullable();
            $table->longText('description')->nullable();
            $table->integer('multiplier')->nullable()->default(1);
            $table->integer('number_of_days')->nullable()->default(0);

            $table->index('business_id');
            $table->index('unit_id');
            $table->index('common_expense_id');
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
        Schema::dropIfExists('expenses');
    }
}
