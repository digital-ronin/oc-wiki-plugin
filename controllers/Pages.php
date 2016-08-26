<?php namespace DigitalRonin\Wiki\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Pages Back-end Controller
 */
class Pages extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('DigitalRonin.Wiki', 'wiki', 'pages');
    }

    public function create()
    {
        BackendMenu::setContextSideMenu('new_page');

        $this->bodyClass = 'compact-container';

        return $this->asExtension('FormController')->create();
    }
}
