<?php namespace DigitalRonin\Wiki\Models;

use Model;
use October\Rain\Database\Traits\Validation;
use October\Rain\Database\Traits\SoftDelete;

/**
 * Model
 */
class Version extends Model
{
    use Validation;
    use SoftDelete;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalronin_wiki_versions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'page_id',
        'draft',
        'content'
    ];

    /**
     * Soft deleting
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Relations
     */
    public $hasOne = [
        'latestVersion' => [
            'DigitalRonin\Wiki\Model\Version',
            'scope' => 'latestVersion'
        ]
    ];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeLatestVersion($query)
    {
        return $query->latest();
    }
}
