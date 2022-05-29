<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeStudentsReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_students_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('chief_name_ar');
            $table->string('chief_role_ar');
            $table->string('chief_description_ar');
            $table->string('chief_name_en');
            $table->string('chief_role_en');
            $table->string('chief_description_en');
            $table->text('image');
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
        Schema::dropIfExists('home_students_reviews');
    }
}
