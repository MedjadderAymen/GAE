<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("department_id")->nullable();
            $table->unsignedBigInteger("defence_id")->nullable();
            $table->timestamp("birth_date");
            $table->string("serial_number");
            $table->string("inscription_number");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("department_id")->references("id")->on("departments")->onDelete("set null");
            $table->foreign("defence_id")->references("id")->on("defences")->onDelete("set null");
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
        Schema::table("students", function (Blueprint $table) {

            $table->dropForeign("students_user_id_foreign");
            $table->dropForeign("students_department_id_foreign");
            $table->dropForeign("students_defence_id_foreign");

        });

        Schema::dropIfExists('students');
    }
}
