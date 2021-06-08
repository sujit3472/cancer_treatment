<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiryPlanGenration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiry_plan_genration', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_enquiry_id');
            $table->foreign('patient_enquiry_id')->references('id')->on('patient_enquiry');
            $table->longText('description');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('users');
            $table->text('file_name')->nullable();
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
        Schema::dropIfExists('enquiry_plan_genration');
    }
}
