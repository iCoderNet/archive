<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('surname')->nullable();
            $table->string('image')->nullable();
            $table->string('birth_year')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('nationality')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('social_status')->nullable();
            $table->string('education')->nullable();
            $table->string('party_affiliation')->nullable();
            $table->string('repression_type')->nullable();
            $table->string('work_place')->nullable();
            $table->string('mobilization_date')->nullable();
            $table->string('termination_date')->nullable();
            $table->string('residence_place')->nullable();
            $table->string('profession')->nullable();
            $table->string('mobilized_by')->nullable();
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('person');
    }
}
