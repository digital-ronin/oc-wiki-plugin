<?php namespace DigitalRonin\Wiki\Controllers;

use DigitalRonin\Wiki\Models\Page;
use Illuminate\Routing\Controller;

class WikiController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $page = new \Model();
        $page->title  = 'test';
        $page->content = 'Diet ist ein test';

        return view('digitalronin.wiki::index')->with(['wiki' => $page]);
    }

    /**
     * Show page
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $page = new \Model();
        $page->title  = 'test';
        $page->slug = $slug;
        $page->content = 'Diet ist ein test';

        return view('digitalronin.wiki::index')->with(['wiki' => $page]);
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
     */
    public function history($pageSlug)
    {
        return view('digitalronin.wiki::index');
    }


    /*
     * TODO: AJAX Functions
     */
}