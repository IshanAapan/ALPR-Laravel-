<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
        //    . $table->integer("user_id")->nullable();
            // $table->integer("location_id")->nullable();
            // $table->float("balance")->nullable();
            $table->string("tag_id");
            $table->string("tag_image");
            $table->string("region")->nullable();
            $table->string("make")->nullable();
            $table->string("model")->nullable();
            $table->string("color")->nullable();
            $table->string("vehicle_type");
            $table->json("raw_data")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
