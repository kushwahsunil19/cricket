<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutusTable extends Migration
{
    public function up()
    {
        Schema::create('aboutus', function (Blueprint $table) {
            $table->id();
            $table->text('aboutUsContent');
            // Add any additional columns you need
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aboutus');
    }
}
