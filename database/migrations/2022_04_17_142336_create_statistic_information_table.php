<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistic_information', function (Blueprint $table) {
            $table->id();
            $table->string("user_agent");
            $table->string("user_ip");
            $table->unsignedBigInteger('link_id')->nullable();
            $table->foreign('link_id')
                ->references('id')
                ->on('links')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('statistic_information');
    }
}
