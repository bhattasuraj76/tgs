<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('day')->nullable();
            $table->string('office_start_time')->nullable();
            $table->string('office_end_time')->nullable();
            $table->string('break_start_time')->nullable();
            $table->string('break_end_time')->nullable();
            $table->integer('max_quotas')->nullable();
            $table->integer('allocation_time')->nullable();
            $table->integer('position')->nullable();
            $table->string('status')->default('published');
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
        Schema::dropIfExists('working_days');
    }
}
