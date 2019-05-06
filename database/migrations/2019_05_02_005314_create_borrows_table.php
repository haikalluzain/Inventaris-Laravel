<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date_borrow');
            $table->dateTime('date_return');
            $table->integer('employee_id')->unsigned();
            $table->integer('officer_id')->unsigned()->nullable();
            $table->enum('status',['uncompleted','booking','borrowed','returned','denied','canceled'])->default('uncompleted');
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
        Schema::dropIfExists('borrows');
    }
}
