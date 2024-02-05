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
        Schema::create('fess_payment_form', function (Blueprint $table) {
            $table->id();
            $table->string('edu_location_id');
            $table->string('edu_course');
            $table->string('edu_mode');
            $table->string('full_name');
            $table->string('email');
            $table->string('mobile_number');
            $table->string('amount');
            $table->text('address');
            $table->text('remark');
            $table->string('is_deleted')->default(false);
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('fess_payment_form');
    }
};
