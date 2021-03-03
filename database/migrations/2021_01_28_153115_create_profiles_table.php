<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements("id")->unsigned();
            $table->foreignId("user_id")->constrained("users")->onUpdated()->onDeleted(); // Foreign Key
            $table->string("first_name",60);
            $table->string("second_name",25);
            $table->string("last_name",25)->nullable();
            $table->string("img",100)->nullable();
            $table->char("genre",1);
            $table->date("born_date")->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
