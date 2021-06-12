<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("search_domain_id");
            $table->unsignedBigInteger("teacher_id");
            $table->timestamp("project");
            $table->foreign("search_domain_id")->references("id")->on("search_domains")->onDelete(null);
            $table->foreign("teacher_id")->references("id")->on("teachers")->onDelete(null);
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
        Schema::table("projects", function (Blueprint $table) {

            $table->dropForeign("projects_department_id_foreign");
            $table->dropForeign("projects_search_domain_id_foreign");

        });

        Schema::dropIfExists('projects');
    }
}
