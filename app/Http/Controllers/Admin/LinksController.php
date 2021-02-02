<?php

namespace App\Http\Controllers\Admin;

use App\Models\Link;
use App\Models\Website;
use App\Models\ItemSchema;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::orderBy('id', 'DESC')->paginate(10);
        $itemSchemas = ItemSchema::all();

        return view('dashboard.link.index')->withLinks($links)->withItemSchemas($itemSchemas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $websites = Website::all();

        return view('dashboard.link.create')->withWebsites($websites);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required',
            'main_filter_selector' => 'required',
            'website_id' => 'required',
        ]);

        $link = new Link();
        $link->url = $request->get('url');
        $link->main_filter_selector = $request->get('main_filter_selector');
        $link->website_id = $request->get('website_id');
        $link->save();
        return redirect()->route('links.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        $websites = Website::all();
        return view('dashboard.link.edit')->withLink($link)->withWebsites($websites);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $this->validate($request, [
            'url' => 'required',
            'main_filter_selector' => 'required',
            'website_id' => 'required'
        ]);

        $link->url = $request->get('url');
        $link->main_filter_selector = $request->get('main_filter_selector');
        $link->website_id = $request->get('website_id');
        $link->save();
        return redirect()->route('links.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
    }
}
