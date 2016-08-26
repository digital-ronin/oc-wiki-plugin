<?php namespace DigitalRonin\Wiki;

use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    /**
     * @inheritdoc
     */
    public function pluginDetails()
    {
        return [
            'name' => 'wiki',
            'description' => 'Provides some really cool wiki features.',
            'author' => 'Digital Ronin',
            'icon' => 'icon-book'
        ];
    }

    public function registerComponents()
    {
        return [
            'DigitalRonin\Wiki\Components\Wiki' => 'wikiPage'
        ];
    }

    /**
     * @inheritdoc
     */
    public function registerNavigation()
    {
        return [
            'wiki' => [
                'label'       => 'Wiki',
                'url'         => Backend::url('digitalronin/wiki/pages'),
                'icon'        => 'icon-book',
                //'permissions' => ['digitalronin.wiki.*'],
                'order'       => 30,

                'sideMenu'    => [
                    'new_page' => [
                        'label'       => 'New page',
                        'icon'        => 'icon-plus',
                        'url'         => Backend::url('digitalronin/wiki/pages/create'),
                        //'permissions' => ['rainlab.blog.access_posts']
                    ],
                    'pages' => [
                        'label'       => 'Pages',
                        'icon'        => 'icon-copy',
                        'url'         => Backend::url('digitalronin/wiki/pages'),
                        //'permissions' => ['digitalronin.wiki.*']
                    ]
                ]
            ]
        ];
    }
}
