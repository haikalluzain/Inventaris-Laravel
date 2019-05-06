<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('level_id')->references('id')->on('levels');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('officer_id')->references('id')->on('users');
        });

        Schema::table('borrows', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('officer_id')->references('id')->on('users');
        });

        Schema::table('borrow_details', function (Blueprint $table) {
            $table->foreign('borrow_id')->references('id')->on('borrows');
            $table->foreign('item_id')->references('id')->on('items');
        });

        Schema::table('maintenances', function (Blueprint $table) {
            $table->foreign('borrow_id')->references('id')->on('borrows');
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('maintainer_id')->references('id')->on('users');
        });

        Schema::table('supplies', function (Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('officer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
