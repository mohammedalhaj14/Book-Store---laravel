<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('messages', function (Blueprint $blueprint) {
            // This allows the database to accept messages without a subject
            $blueprint->string('subject')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('messages', function (Blueprint $blueprint) {
            $blueprint->string('subject')->nullable(false)->change();
        });
    }
};