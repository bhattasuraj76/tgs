<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            //basic
            $table->string('site_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('site_owner')->nullable();
            $table->string('slogan')->nullable();
            $table->text('about_us')->nullable();
            $table->string('office_time')->nullable();
            $table->string('established_year')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('mobile1')->nullable();
            $table->string('mobile2')->nullable();
            $table->string('employee1')->nullable();
            $table->string('employee2')->nullable();
            //address
            $table->string('street_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('time_zone')->nullable();
            //contact
            $table->string('fax_no')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('primary_email')->nullable();
            $table->string('secondary_email')->nullable();
            $table->string('tertiary_email')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('pinterest_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('skype_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->text('map_iframe')->nullable();
            //tailored
            $table->string('office_start_time')->nullable();
            $table->string('office_end_time')->nullable();
            $table->string('break_start_time')->nullable();
            $table->string('break_end_time')->nullable();
            $table->integer('max_quotas')->nullable();
            $table->integer('allocation_time')->nullable();
            
            //seo
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
