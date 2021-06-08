<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiryDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiry_document', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_enquiry_id');
            $table->foreign('patient_enquiry_id')->references('id')->on('patient_enquiry');
            $table->string('document_name');
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enquiry_document');
    }
}
