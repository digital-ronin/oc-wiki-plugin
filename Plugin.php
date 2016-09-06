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
            'name'        => 'Wiki',
            'description' => 'Provides some really cool Wiki features.',
            'author'      => 'Digital Ronin',
            'icon'        => 'icon-book',
            'homepage'    => 'https://github.com/digital-ronin/oc-wiki-plugin/'
        ];
    }

    /**
     * @inheritdoc
     */
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
                    ],
                    'categories' => [
                        'label'       => 'rainlab.blog::lang.blog.categories',
                        'icon'        => 'icon-list-ul',
                        'url'         => Backend::url('digitalronin/wiki/categories'),
                        'permissions' => ['rainlab.blog.access_categories']
                    ]
                ]
            ]
        ];
    }

    /**
     * @return array
     */
    public function registerFormWidgets()
    {
        return [
            'Backend\FormWidgets\CodeEditor' => [
                'label' => 'Code editor',
                'code'  => 'codeeditor'
            ],

            'Backend\FormWidgets\RichEditor' => [
                'label' => 'Rich editor',
                'code'  => 'richeditor'
            ],

            'Backend\FormWidgets\MarkdownEditor' => [
                'label' => 'Markdown editor',
                'code'  => 'markdown'
            ],

            'Backend\FormWidgets\FileUpload' => [
                'label' => 'File uploader',
                'code'  => 'fileupload'
            ],

            'Backend\FormWidgets\Relation' => [
                'label' => 'Relationship',
                'code'  => 'relation'
            ],

            'Backend\FormWidgets\DatePicker' => [
                'label' => 'Date picker',
                'code'  => 'datepicker'
            ],

            'Backend\FormWidgets\TimePicker' => [
                'label' => 'Time picker',
                'code'  => 'timepicker'
            ],

            'Backend\FormWidgets\ColorPicker' => [
                'label' => 'Color picker',
                'code'  => 'colorpicker'
            ],

            'Backend\FormWidgets\DataTable' => [
                'label' => 'Data Table',
                'code'  => 'datatable'
            ],

            'Backend\FormWidgets\RecordFinder' => [
                'label' => 'Record Finder',
                'code'  => 'recordfinder'
            ],

            'Backend\FormWidgets\Repeater' => [
                'label' => 'Repeater',
                'code'  => 'repeater'
            ],

            'Backend\FormWidgets\TagList' => [
                'label' => 'Tag List',
                'code'  => 'taglist'
            ]
        ];
    }
}
