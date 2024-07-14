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
        Schema::table('hr.users', function (Blueprint $table) {
            $table->integer('department_id');
            $table->integer('designation_id');
            $table->foreign('department_id')->references('department_id')->on('hr.departments');
            $table->foreign('designation_id')->references('designation_id')->on('hr.designations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hr.users', function (Blueprint $table) {
            $table->dropForeign('hr_departments_department_id_foreign');
            $table->dropForeign('hr_designation_designation_id_foreign');
            $table->dropColumn('department_id');
            $table->dropColumn('designation_id');
        });
    }
};
