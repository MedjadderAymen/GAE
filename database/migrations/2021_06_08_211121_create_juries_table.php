<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juries', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("jury_id");
            $table->unsignedBigInteger("examiner_id");
            $table->foreign("jury_id")->references("id")->on("teachers")->onDelete(null);
            $table->foreign("examiner_id")->references("id")->on("teachers")->onDelete(null);
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

        Schema::table("juries", function (Blueprint $table) {

            $table->dropForeign("juries_jury_id_foreign");
            $table->dropForeign("juries_examiner_id_foreign");

        });

        Schema::dropIfExists('juries');
    }
}
