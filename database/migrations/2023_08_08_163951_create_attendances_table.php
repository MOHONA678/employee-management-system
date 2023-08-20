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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("employee_id")->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete("cascade");
            $table->boolean('state')->default(0);
            $table->time('attendance_time')->default(date("H:i:s"));;
            $table->date('attendance_date');
            $table->boolean('type')->unsigned()->default(0);
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
