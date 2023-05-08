<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpsLookupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cps_lookup', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("lookup_id");
            $table->string("lookup_desc");
            $table->timestamp("created_at")->nullable();
            $table->string("created_by")->nullable();
            $table->timestamp("updated_at")->nullable();
            $table->string("updated_by")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cps_lookup');
    }
}
