<?php

namespace App\Http\Controllers\Admin;

use App\Models\Website;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websites = Website::orderBy('id', 'DESC')->paginate(10);
 
        return view('dashboard.website.index')->withWebsites($websites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $website = new Website();

        return view('dashboard.website.create')->withWebsite($website);
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
            'title' => 'required',
            'url' => 'required',
            'logo' => 'nullable|image'
        ]);
        $website = new Website();
        $website->title = $request->get('title');
        $website->url = $request->get('url');
        if ($request->hasFile('logo')){
            $website->logo = $this->uploadFile('logo', 'public/website/uploads', $request)["filename"];
        }
        $website->save();
        return redirect()->route('websites.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Website  $website
     * @return \Illuminate\Http\Response
     */
    public function edit(Website $website)
    {
        return view('dashboard.website.edit')->withWebsite($website);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Website  $website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Website $website)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required'
        ]);

        $website->title = $request->input('title');
        $website->url = $request->input('url');
        if ($request->hasFile('logo')) {
            $website->logo = $this->uploadFile('logo', 'public/website/uploads', $request)["filename"];
        }
        $website->save();
        return redirect()->route('websites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Website  $website
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website)
    {
        //
    }
}
