<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defences', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("teacher_id");
            $table->date("date");
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

        Schema::table("defences", function (Blueprint $table) {


        });

        Schema::dropIfExists('defences');
    }
}
