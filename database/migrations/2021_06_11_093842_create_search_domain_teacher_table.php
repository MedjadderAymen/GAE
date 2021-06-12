<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchDomainTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_domain_teacher', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("search_domain_id");
            $table->unsignedBigInteger("teacher_id");
            $table->foreign("search_domain_id")->references("id")->on("search_domains")->onDelete("cascade");
            $table->foreign("teacher_id")->references("id")->on("teachers")->onDelete("cascade");
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
        Schema::table("search_domain_teacher", function (Blueprint $table) {

            $table->dropForeign("search_domain_teacher_search_domain_id_foreign");
            $table->dropForeign("search_domain_teacher_teacher_id_foreign");

        });
        Schema::dropIfExists('search_domain_teacher');
    }
}
