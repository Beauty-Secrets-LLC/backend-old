<?php

namespace App\Http\Controllers;

use App\Models\GiftCardTemplate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class GiftCardTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('giftcards.templates.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('giftcards.templates.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        try {

            $template = GiftCardTemplate::create($request->all())
            ->addMedia($request['template_image'])
            ->withResponsiveImages()
            ->toMediaCollection('giftcard-image', 'gcs');
            session()->flash('success', 'Шинэ загвар хадгалагдлаа.');
            
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }


        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GiftCardTemplate  $giftCardTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(GiftCardTemplate $giftCardTemplate, $id)
    {
        //
        $template = $giftCardTemplate->find($id);
        return view('giftcards.templates.view', compact('template'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GiftCardTemplate  $giftCardTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(GiftCardTemplate $giftCardTemplate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GiftCardTemplate  $giftCardTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GiftCardTemplate $giftCardTemplate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GiftCardTemplate  $giftCardTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(GiftCardTemplate $giftCardTemplate)
    {
        //
    }
}
