<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_models', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64)->default('None');
            $table->string('department', 32)->nullable();
            $table->string('stage', 16)->nullable();
            $table->text('description');
            $table->string('pdf_file')->nullable();
            $table->string('doc_file')->nullable();
            $table->text('commercialization')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('project_models');
    }
}
