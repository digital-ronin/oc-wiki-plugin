<?php namespace DigitalRonin\Wiki\Controllers;

use DigitalRonin\Wiki\Models\Page;
use Illuminate\Routing\Controller;

class WikiController extends Controller
{
    /**
     * Show page
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function showPage($slug = null)
    {
        if(is_null($slug))
            $slug = 'index';

        $page = new \Model();
        $page->title  = 'Test';
        $page->slug = $slug;
        $page->content = 'Diet ist ein test';

        return view('digitalronin.wiki::page')->with(['wiki' => $page]);
    }

    /**
     * Show page edit
     *
     * @param string $slug
     * @return mixed
     */
    public function edit($slug)
    {
        return "edit {$slug} page";
    }

    /**
     * @param $pageSlug
     * @return mixed
     */
    public function history($pageSlug)
    {
        return view('digitalronin.wiki::index');
    }


    /*
     * TODO: AJAX Functions
     */
}