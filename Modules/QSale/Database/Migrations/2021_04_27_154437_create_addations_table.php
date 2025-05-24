<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json("name");
            $table->json("description")->nullable();
            $table->string("icon")->default("/uploads/users/user.png");
            $table->double("price")->default(0);
            $table->boolean("status")->default(true);
            $table->softDeletes();
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
        Schema::dropIfExists('addations');
    }
}
