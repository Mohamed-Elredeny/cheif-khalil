<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar');

            $table->string('achievement_1_en');
            $table->text('achievement_details_1_en');

            $table->string('achievement_2_en');
            $table->text('achievement_details_2_en');

            $table->string('achievement_3_en');
            $table->text('achievement_details_3_en');

            $table->string('achievement_1_ar');
            $table->text('achievement_details_1_ar');

            $table->string('achievement_2_ar');
            $table->text('achievement_details_2_ar');

            $table->string('achievement_3_ar');
            $table->text('achievement_details_3_ar');

            $table->text('video');

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
        Schema::dropIfExists('home_achievements');
    }
}
