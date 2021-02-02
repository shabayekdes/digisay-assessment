<?php

namespace App\Http\Controllers\Admin;

use App\Models\Link;
use App\Models\Website;
use App\Facades\Scraper;
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

    /**
     * @param Request $request
     */
    public function setItemSchema(Request $request)
    {

        if (!$request->item_schema_id && !$request->link_id) {
            return;
        }

        $link = Link::find($request->link_id);

        $link->item_schema_id = $request->item_schema_id;
        $link->save();

        return response()->json(['msg' => 'Link updated!']);
    }

    /**
     * scrape specific link
     *
     * @param Request $request
     */
    public function scrape(Request $request)
    {
        if (!$request->link_id) {
            return;
        }

        $link = Link::find($request->link_id);

        if (empty($link->main_filter_selector) && (empty($link->item_schema_id) || $link->item_schema_id == 0)) {
            return;
        }
 
        $scraper = Scraper::handle($link);

        if ($scraper->status == 1) {
            return response()->json(['status' => 1, 'msg' => 'Scraping done']);
        } else {
            return response()->json(['status' => 2, 'msg' => $scraper->status]);
        }
    }
}
