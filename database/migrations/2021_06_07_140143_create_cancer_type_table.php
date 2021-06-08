<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancerTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancer_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('cancer_type')->insert([
            'name'       => 'Bladder Cancer',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('cancer_type')->insert([
            'name'       => 'Breast Cancer',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('cancer_type')->insert([
            'name'       => 'Colorectal Cancer',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('cancer_type')->insert([
            'name'       => 'Kidney Cancer',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('cancer_type')->insert([
            'name'       => 'Lung Cancer - Non-Small Cell',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('cancer_type')->insert([
            'name'       => 'Lymphoma - Non-Hodgkin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cancer_type');
    }
}
