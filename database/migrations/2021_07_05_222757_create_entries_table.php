<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string("childFirstName");
            $table->string ("childMiddleName");
            $table->string("childLastNam");
            $table->string("motherFirstName");
            $table->string("motherMiddleName");
            $table->string("motherLastName");
            $table->string("fatherFirstName");
            $table->string("fatherMiddleName");
            $table->string("fatherLastName");
            $table->date("dateOfBirth");
            $table->string("gender");
            $table->string("typeOfBirth");
            $table->string("natureOfBirth");
            $table->unsignedBigInteger("hospital_id");
            $table->unsignedBigInteger("user_id");
            $table->string("createdBy");
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
        Schema::dropIfExists('entries');
    }
}
