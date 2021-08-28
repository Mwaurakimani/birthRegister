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
            $table->unsignedBigInteger("hospital_id")->nullable();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->string("createdBy");
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('set Null');
            $table->foreign('hospital_id')
                ->references('id')
                ->on('hospitals')
                ->onUpdate('cascade')
                ->onDelete('set Null');
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
