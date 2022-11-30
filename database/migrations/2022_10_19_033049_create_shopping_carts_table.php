<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->float('total');

                //Foreign keys
                //** Orders table**/
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');

                //** Products table**/
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')->references('id')->on('products');

                $table->softDeletes();
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
        Schema::dropIfExists('shopping_carts');
        
    }
}
