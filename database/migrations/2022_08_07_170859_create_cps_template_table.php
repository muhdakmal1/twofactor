<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpsTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cps_template', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("customer_id");
            $table->string("url_img");
            $table->string("father_name");
            $table->string("mother_name");
            $table->string("customer_name");
            $table->string("couple_name");
            $table->string("location_short");
            $table->timestamp("date_event");
            $table->string("time_event1");
            $table->string("timedec_event1");
            $table->string("time_event2");
            $table->string("timedec_event2");
            $table->string("time_event3");
            $table->string("timedec_event3");
            $table->string("contact_person1");
            $table->string("contact_no1");
            $table->string("contact_relation1");
            $table->string("contact_person2");
            $table->string("contact_no2");
            $table->string("contact_relation2");
            $table->string("contact_person3");
            $table->string("contact_no3");
            $table->string("contact_relation3");
            $table->string("music_id");
            $table->string("googlemap_url")->nullable();
            $table->string("wazemap_url")->nullable();
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
        Schema::dropIfExists('cps_template');
    }
}
