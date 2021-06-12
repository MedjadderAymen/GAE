<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_responsables', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("user_id");
            $table->string("responsibility");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
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
        Schema::table("head_responsables", function (Blueprint $table) {

            $table->dropForeign("head_responsables_user_id_foreign");

        });
        Schema::dropIfExists('head_responsables');
    }
}
