<?php

namespace App\Http\Controllers\Admin;

use App\Models\ItemSchema;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemSchemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemSchema = ItemSchema::orderBy('id', 'DESC')->paginate(10);

        return view('dashboard.item_schema.index')->withItemSchemas($itemSchema);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemSchema = new ItemSchema();

        return view('dashboard.item_schema.create')->withItemSchema($itemSchema);
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
            'css_expression' => 'required',
            'full_content_selector' => 'required'
        ]);
        $itemSchema = new ItemSchema();
        $itemSchema->title = $request->get('title');
        if ($request->has('is_full_url')) {
            $itemSchema->is_full_url = 1;
        } else {
            $itemSchema->is_full_url = 0;
        }
        $itemSchema->css_expression = $request->get('css_expression');
        $itemSchema->full_content_selector = $request->get('full_content_selector');
        $itemSchema->save();
        return redirect()->route('item-schema.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ItemSchema  $itemSchema
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemSchema $itemSchema)
    {
        return view('dashboard.item_schema.edit')->withItemSchema($itemSchema);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ItemSchema  $itemSchema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemSchema $itemSchema)
    {
        $this->validate($request, [
            'title' => 'required',
            'css_expression' => 'required',
            'full_content_selector' => 'required'
        ]);

        $itemSchema->title = $request->get('title');
        if ($request->has('is_full_url')) {
            $itemSchema->is_full_url = 1;
        } else {
            $itemSchema->is_full_url = 0;
        }
        $itemSchema->css_expression = $request->get('css_expression');
        $itemSchema->full_content_selector = $request->get('full_content_selector');
        $itemSchema->save();

        return redirect()->route('item-schema.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ItemSchema  $itemSchema
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemSchema $itemSchema)
    {
        //
    }
}
