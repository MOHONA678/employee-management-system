<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger("user_id")->unsigned();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->bigInteger("department_id")->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete("cascade");
            $table->string('firstname', 50)->nullable();
            $table->string('lastname', 50);
            $table->string('email')->unique();
            $table->string('phone', 19)->unique();
            $table->string('address')->nullable();
            $table->date('dob')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->tinyInteger('religion')->nullable();
            $table->tinyInteger('marital')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
