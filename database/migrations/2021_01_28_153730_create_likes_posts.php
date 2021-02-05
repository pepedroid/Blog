<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes_posts', function (Blueprint $table) {
            //$table->id();
            // Commo esta tabla lleva una lalve compuesta, SU LALVE PRIMARIA SE COMPONE POR EL ID DEL POST Y DEL USUARIO
            $table->foreignId("post_id")->constrained()->onUpdated()->onDeleted();
            $table->foreignId("user_id")->constrained()->onUpdated()->onDeleted();
            $table->primary(['post_id','user_id']);
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
        Schema::dropIfExists('likes_posts');
    }
}
