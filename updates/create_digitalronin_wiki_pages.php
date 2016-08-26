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
            $table->text('content');
            $table->boolean('draft')->default(true);
            
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digitalronin_wiki_pages');
    }
}
