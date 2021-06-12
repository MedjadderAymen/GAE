<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationConstraint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affectations', function (Blueprint $table) {
            $table->foreign("defence_id")->references("id")->on("defences")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("affectations", function (Blueprint $table) {

            $table->dropForeign("affectations_defence_id_foreign");

        });
    }
}
