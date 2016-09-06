<?php namespace DigitalRonin\Wiki\Models;

use Model;

/**
 * Model
 */
class Page extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalronin_wiki_pages';

    /**
     * Validation
     */
    public $rules = [
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug'];

    /**
     * Soft deleting
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var array Relations
     */
    public $belongsToMany = [
        'categories' => [
            'DigitalRonin\Wiki\Models\Category',
            'table' => 'digitalronin_wiki_pages_categories',
            'order' => 'name'
        ]
    ];

    /**
     * @return Page
     */
    public function getContent() {
        $model = new Page();
        $model->title = 'test title';
        $model->slug = 'test-slug';
        $model->content = 'dies ist ein test';

        return $model;
    }

    /**
     * Scope a query to only include current Content.
     * @param $query
     */
    public function scopeCurrentContent($query)
    {
        return $query
            ->where('draft', false);
    }
}
