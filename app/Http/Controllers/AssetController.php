<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssetRequest;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Asset::all();

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAssetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssetRequest $request)
    {
        $attributes = [
            'type' => $request->type,
            'serial_number' => $request->serial_number,
            'description' => $request->description,
            'fixed_or_movable' => $request->fixed_or_movable,
            'purchased_date' => $request->purchased_date,
            'start_use_date' => $request->start_use_date,
            'purchase_price' => $request->purchase_price,
            'current_value_in_naira' => $request->current_value_in_naira,
            'warranty_expiry_date' => $request->warranty_expiry_date,
            'degradation_in_years' => $request->degradation_in_years,
            'location' => $request->location
        ];
        if (isset($request->picture)) {
            $attributes['picture_path'] = $request->file('picture')->store('pictures');

        }
        return Asset::create($attributes);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        return $asset;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
       $asset->update($request->all());
       return $asset;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        $image = 'storage/'.$asset->picture_path;
        if (File::exists($image)) {
            File::delete($image);
        }
        $asset->delete();
        return response()->json('Asset deleted!!');
    }
}
