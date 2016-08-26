<?php namespace DigitalRonin\Wiki\Models;

use Model;

/**
 * Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalronin_wiki_categories';

    /**
    * @inheritdoc
    */
    public $rules = [
        'name' => 'required',
        'slug' => 'required|between:3,64|unique:digitalronin_wiki_categories'
    ];

    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = [
        'name',
    ];

    /**
     * @inheritdoc
     */
    protected $guarded = [];

    /**
     * Generate a URL slug for this model
     */
    public function beforeValidate()
    {
        if (!$this->exists && !$this->slug)
            $this->slug = Str::slug($this->name);
    }

    /**
     * Relations
     */
    public $belongsToMany = [
        'pages' => [
            'RainLab\Blog\Models\Page',
            'table' => 'digitalronin_wiki_pages_categories',
            'order' => 'name desc'
        ]
    ];

}
