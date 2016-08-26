<?php namespace DigitalRonin\Wiki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateDigitalroninWikiCategories extends Migration
{
    public function up()
    {
        Schema::create('digitalronin_wiki_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('name');
            $table->unsignedInteger('parent_id')->nullable();

            $table->unique(['parent_id', 'name']);

            // Auto Columns
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('digitalronin_wiki_categories');
    }
}
