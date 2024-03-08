<?php

// database/migrations/xxxx_xx_xx_create_faq_categories_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('faq_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faq_categories');
    }
}

