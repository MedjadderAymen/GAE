<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("department_id")->nullable();
            $table->unsignedBigInteger("affectation_id")->nullable();
            $table->string("grade");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("department_id")->references("id")->on("departments")->onDelete("set null");
            $table->foreign("affectation_id")->references("id")->on("affectations")->onDelete("set null");
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
        Schema::table("teachers", function (Blueprint $table) {

            $table->dropForeign("teachers_user_id_foreign");
            $table->dropForeign("teachers_department_id_foreign");
            $table->dropForeign("teachers_affectation_id_foreign");

        });
        Schema::dropIfExists('teachers');
    }
}
