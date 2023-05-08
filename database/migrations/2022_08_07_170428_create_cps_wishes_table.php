<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpsWishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cps_wishes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("customer_id");
            $table->string("name_recipient");
            $table->string("comment_recipient");
            $table->integer("presence_recipient");
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cps_wishes');
    }
}
