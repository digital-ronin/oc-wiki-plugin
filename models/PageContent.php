<?php namespace DigitalRonin\Wiki\Models;

use Model;

/**
 * \DigitalRonin\Wiki\PageContent
 *
 */
class PageContent extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var bool that if true will automatically set created_at and updated_at fields.
     */
    public $timestamps = true;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalronin_wiki_pages_content';

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'page' => ['DigitalRonin\Wiki\Models\Page', 'page_id' => 'id'],
        'createdByUser' => ['RainLab\User\Models\User', 'created_by_user_id' => 'id']
    ];
}
