<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('media.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }

    public function upload(Request $request)
    {
        $disk = Storage::disk('gcs');
        $file = $disk->put('images', $request->file('file'), $request->file('file')->getClientOriginalName());
        //$url = $disk->url('/images/mkbeoX4ReO0S8CZWjX95IGJkrn5rOThi4TvbOgnC.jpg');
        //$delete = $disk->delete('/images/mkbeoX4ReO0S8CZWjX95IGJkrn5rOThi4TvbOgnC.jpg');
        // $product = \Product::find(74);
        // $sda = $product->addMedia($request['fileToUpload'])->toMediaCollection('featured', 'gcs');
        // $image = $product->getMedia('sda')->first()->getUrl();
        dump($file);
    }
}
