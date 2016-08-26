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

            $table->string('name')->nullable();
            $table->string('slug')->nullable()->index();

            $table->integer('parent_id')->unsigned()->index()->nullable();
            $table->integer('nest_left')->nullable();
            $table->integer('nest_right')->nullable();
            $table->integer('nest_depth')->nullable();

            // Auto Columns
            $table->timestamps();
        });

        Schema::create('digitalronin_wiki_pages_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('page_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->primary(['page_id', 'category_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('digitalronin_wiki_categories');
        Schema::dropIfExists('digitalronin_wiki_pages_categories');
    }
}
