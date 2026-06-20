<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bmets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('passport_no');
            $table->string('ec_no')->nullable();
            $table->string('clearance_id')->nullable();
            $table->date('ec_date')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('blood_group', 5)->nullable();
            $table->date('passport_issue_date')->nullable();
            $table->date('passport_expiry_date')->nullable();
            $table->string('visa_no')->nullable();
            $table->date('visa_issue_date')->nullable();
            $table->date('visa_expiry_date')->nullable();
            $table->string('referral_name')->nullable();
            $table->string('employer')->nullable();
            $table->string('country')->nullable();
            $table->string('office_name')->nullable();
            $table->string('rl_no')->nullable();
            $table->string('phone')->nullable();
            $table->string('bmet_no')->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('nid')->nullable();
            $table->string('village')->nullable();
            $table->string('post_office')->nullable();
            $table->string('police_station')->nullable();
            $table->string('upazila')->nullable();
            $table->string('district')->nullable();
            $table->string('division')->nullable();
            $table->string('photo')->nullable();
            $table->string('qr_code')->nullable();
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
        Schema::dropIfExists('bmets');
    }
};
