<?php namespace DigitalRonin\Wiki\Updates;

use October\Rain\Database\Traits\SoftDelete;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreateDigitalroninWikiPages extends Migration
{
    use SoftDelete;


    public function up()
    {
        Schema::create('digitalronin_wiki_pages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content')->nullable();

            $table->boolean('draft')->default(true);

            // Category
            $table->unsignedInteger('category_id');
            $table
                ->foreign('category_id')
                ->references('id')
                ->on('digitalronin_wiki_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');


            // Auto Columns
            $table->timestamps();
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digitalronin_wiki_pages');
    }
}
