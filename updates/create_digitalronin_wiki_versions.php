<?php namespace DigitalRonin\Wiki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use October\Rain\Database\Traits\SoftDelete;

class CreateDigitalroninWikiVersions extends Migration
{
    use SoftDelete;

    private $tableName = 'digitalronin_wiki_versions';

    public function up()
    {
        Schema::create($this->tableName, function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('title');
            $table->text('content');

            $table->boolean('draft')
                  ->default(true);

            // Foreign Keys
            $table->unsignedInteger('page_id');
            $table
                ->foreign('page_id')
                ->references('id')
                ->on('digitalronin_wiki_pages')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
