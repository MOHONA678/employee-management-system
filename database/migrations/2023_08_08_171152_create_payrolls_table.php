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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("employee_id")->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete("cascade");
            $table->year('year')->nullable();
            $table->unsignedTinyInteger('month')->nullable();
            $table->decimal('basic', 10, 2)->nullable();
            $table->decimal('house_rent', 10, 2)->nullable();
            $table->decimal('medical', 10, 2)->nullable();
            $table->decimal('transport', 10, 2)->nullable();
            $table->decimal('phone_bill', 10, 2)->nullable();
            $table->decimal('internet_bill', 10, 2)->nullable();
            $table->decimal('special', 10, 2)->nullable();
            $table->decimal('overtime_pay', 10, 2)->nullable();
            $table->decimal('provident_fund', 10, 2)->nullable();
            $table->decimal('income_tax', 10, 2)->nullable();
            $table->decimal('health_insurance', 10, 2)->nullable();
            $table->decimal('life_insurance', 10, 2)->nullable();
            $table->string('days_present')->nullable();
            $table->string('days_absent')->nullable();
            $table->decimal('gross_salary', 10, 2)->nullable();
            $table->decimal('deduction', 10, 2)->nullable();
            $table->decimal('net_salary', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
