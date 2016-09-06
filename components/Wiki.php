<?php namespace DigitalRonin\Wiki\Components;

use Cms\Classes\ComponentBase;
use DigitalRonin\Wiki\Models\Page as WikiPage;
use DigitalRonin\Wiki\Controllers\Pages as WikiPagesController;
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

        // Build a back-end form with the context of 'frontend'
        $formController = new WikiPagesController();
        $formController->create('frontend');

        // Append the formController to the page
        $this->page['form'] = $formController;

        // Append the missing style file so that our front-end forms would look
        // just like back-end
        $basePath = '../../..';

        $this->addCss($basePath.'/modules/backend/assets/css/october.css', 'core');

        // Markdown Editor
        //$this->addCss($basePath.'/modules/backend/formwidgets/markdowneditor/assets/css/markdowneditor.css');
        //$this->addJs($basePath.'/modules/backend/formwidgets/markdowneditor/assets/js/markdowneditor.js');

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
     * @return array
     */
    public function onSave() {
        return ['error' => WikiPage::create(post('Page'))];
    }
}
