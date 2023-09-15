<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('global_messages', function (Blueprint $table) {
            $table->string('type')->after('body')->default('info'); 
            $table->string('groups')->after('type')->default('all');
            // This will add the field after the 'body' column. The default type is set to 'info'.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('global_messages', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('groups');
        });
        }
};
