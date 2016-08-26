<?php namespace DigitalRonin\Wiki\Components;

use Cms\Classes\ComponentBase;
use DigitalRonin\Wiki\Models\Page as WikiPage;

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

        /*
         * TODO: Use October CMS Markdown Editor from Backend??
         *
         * $this->addCss('../../../modules/backend/formwidgets/markdowneditor/assets/css/markdowneditor.css');
         * $this->addJs('../../../modules/backend/formwidgets/markdowneditor/assets/js/markdowneditor.js');
         */
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

        return $page;
    }

}
