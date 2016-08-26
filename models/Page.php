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
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['url'];

    /**
     * Soft deleting
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var array Relations
     */
    public $hasMany = [
        'contents' => ['DigitalRonin\Wiki\Models\PageContent', 'page_id' => 'id']
    ];
    public $belongsToMany = [
        'refersTo' => [
            'DigitalRonin\Wiki\Models\Page',
            'table'    => 'digitalronin_wiki_pages_links',
            'key'      => 'page_id',
            'otherKey' => 'refers_to_page_id',
            'pivot'    => 'url'
        ],
        'refersFrom' => [
            'DigitalRonin\Wiki\Models\Page',
            'table'    => 'digitalronin_wiki_pages_links',
            'key'      => 'refers_to_page_id',
            'otherKey' => 'page_id'
        ]
    ];

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
