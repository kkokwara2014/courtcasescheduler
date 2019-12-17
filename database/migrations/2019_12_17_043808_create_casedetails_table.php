<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casedetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('offender');
            $table->string('offense');
            $table->string('gender');
            $table->string('phone');
            $table->string('residence');
            $table->text('additionalinfo');
            $table->integer('casetype_id');
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
        Schema::dropIfExists('casedetails');
    }
}
