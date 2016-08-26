<?php namespace DigitalRonin\Wiki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateDigitalroninWikiPagesContent extends Migration
{
    public function up()
    {
        Schema::create('digitalronin_wiki_pages_content', function($table)
        {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->unsignedInteger('views')
                  ->default(0);
            $table->boolean('draft')
                  ->default(true);
            
            $table->unsignedInteger('page_id');
            $table->foreign('page_id')
                  ->references('id')
                  ->on('wiki_pages')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            
            $table->unsignedInteger('created_by_user_id')
                  ->nullable(true);
            $table->foreign('created_by_user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('set null');
            $table->timestamp('created_at');
            
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digitalronin_wiki_pages_content');
    }
}
