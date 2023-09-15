<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalMessageUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_message_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('global_message_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();  // Optional: if you want to keep track of when a user unsubscribed.

            // Foreign keys
            $table->foreign('global_message_id')->references('id')->on('global_messages')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('global_message_user');
    }
}
