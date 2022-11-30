<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->string('status');
            $table->float('cantidad');
            $table->float('total');
              //Foreign keys
                //** Users tables**/
                // $table->unsignedBigInteger('user_id');
                // $table->foreign('user_id')->references('id')->on('users');

                //** Address table**/
                // $table->unsignedBigInteger('address_id');
                // $table->foreign('address_id')->references('id')->on('addresses');
                $table->unsignedBigInteger('shopping_id');
                $table->foreign('shopping_id')->references('id')->on('shopping_carts');
            

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
        Schema::dropIfExists('orders');
    }
}
