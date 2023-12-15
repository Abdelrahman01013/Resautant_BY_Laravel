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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title_head');
            $table->text('body_head');
            $table->string('photo_head');
            $table->string('video_head');
            $table->text('body_footer');
            $table->string('video_footer');
            $table->string('phone');
            $table->text('address');
            $table->string('email');
            $table->string('hours_of_support');
            $table->string('workers');

            $table->text('opening_hours');
            $table->text('facebook')->nullable();
            $table->text('insta')->nullable();
            $table->text('x')->nullable();
            $table->text('linked_in')->nullable();




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
        Schema::dropIfExists('abouts');
    }
};
