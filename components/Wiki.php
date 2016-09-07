<?php namespace DigitalRonin\Wiki\Components;

use Cms\Classes\ComponentBase;
use DigitalRonin\Wiki\Models\Page as WikiPage;
use DigitalRonin\Wiki\Models\Version;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Wiki extends ComponentBase
{
    /**
     * @var
     */
    public $wiki;

    /**
     * @inheritdoc
     */
    public function componentDetails()
    {
        return [
            'name'        => 'digitalronin.wiki::lang.settings.wiki_title',
            'description' => 'digitalronin.wiki::lang.settings.wiki_description'
        ];
    }

    /**
     * @inheritdoc
     */
    public function defineProperties()
    {
        return [
            'slug' => [
                'title'       => 'digitalronin.wiki::lang.settings.wiki_slug',
                'description' => 'digitalronin.wiki::lang.settings.wiki_slug_description',
                'default'     => '{{ :slug }}',
                'type'        => 'string'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function onRun()
    {
        $this->wiki = $this->page['wiki'] = $this->loadPage();
        $this->loadSimpleMde();
    }

    /**
     * Load SimpleMde Assets
     */
    private function loadSimpleMde() {
        // Load Vendor Files
        $this->addCss('assets/vendor/simplemde/dist/simplemde.min.css');
        $this->addJs('assets/vendor/simplemde/dist/simplemde.min.js');

        // Load Editor js
        $this->addJs('assets/js/editor.js');
    }

    /**
     * load page with given slug
     */
    public function loadPage()
    {
        $slug = $this->property('slug');

        if (empty($slug))
            $slug = 'index';

        $page = WikiPage::currentContent()->where('slug', $slug)->first();

        // TODO: Exception for no record found
        if (is_null($page))
            throw new ModelNotFoundException('No Page found!');

        return $page;
    }

    /**
     * Create a new Wiki Page
     */
    public function onSave() {
        // Build the WikiPage
        $wikiPage = WikiPage::create([
            'title'   => post('title'),
            'slug'    => post('slug'),
            'content' => post('content')
        ]);

        return $wikiPage;
    }

    public function onUpdate() {
        $version = Version::create([
            'page_id' => '1',
            'content' => post('content')
        ]);
    }
}
