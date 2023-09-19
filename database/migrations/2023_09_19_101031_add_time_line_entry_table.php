<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimeLineEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeline_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->string('icon')->default('help'); // Default to a generic icon
            $table->string('description', 1000)->default('No description provided.'); // Changed from TEXT to VARCHAR(1000)
            $table->string('link')->nullable();
            $table->string('type')->default('general');
            $table->enum('visibility', ['private', 'public', 'shared'])->default('private');
            $table->unsignedBigInteger('shared_with')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shared_with')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timeline_entries');
    }
}
