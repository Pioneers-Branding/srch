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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('fide_id')->nullable();
            $table->string('school_college_workplace')->nullable();
            $table->text('streetaddress')->nullable();
            $table->string('country')->nullable();
            $table->string('postcode')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'firstname',
                'lastname',
                'gender',
                'dob',
                'fide_id',
                'school_college_workplace',
                'streetaddress',
                'country',
                'postcode',
                'phone',
                'email',
                'amount',
            ]);
        });
    }
};
