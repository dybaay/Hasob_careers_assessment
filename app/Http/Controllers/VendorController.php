<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendorRequest;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|Vendor[]
     */
    public function index()
    {
       return Vendor::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreVendorRequest $request
     * @return Response
     */
    public function store(StoreVendorRequest $request)
    {
        return Vendor::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Vendor $vendor
     * @return Vendor
     */
    public function show(Vendor $vendor)
    {
            return $vendor;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Vendor $vendor
     * @return Vendor
     */
    public function update(Request $request, Vendor $vendor)
    {
        $vendor->update($request->all());
        return $vendor;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vendor $vendor
     * @return JsonResponse
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return response()->json('Vendor deleted!!');
    }
}
