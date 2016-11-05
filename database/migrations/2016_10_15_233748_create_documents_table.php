<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string("path");
            $table->integer('user_id')->unsigned();
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');;
            $table->integer("collection_id")->unsigned();
            $table->foreign("collection_id")->references("id")->on("collections")->onDelete('cascade');;
            $table->integer("count_like")->default(0);
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
        Schema::drop('documents');
    }
}
