<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('suburb');
            $table->string('street');
            $table->integer('street_numer');
            $table->integer('home_number');
            $table->text('references');
            //Foreign keys
                //** States table **/
                // $table->unsignedBigInteger('state_id');
                // $table->foreign('state_id')->references('id')->on('states');

                //** Municipalities table**/
                $table->unsignedBigInteger('municipality_id');
                $table->foreign('municipality_id')->references('id')->on('municipalities');

                //   //** Users table**/
                //   $table->unsignedBigInteger('user_id');
                //   $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('addresses');
    }
}
