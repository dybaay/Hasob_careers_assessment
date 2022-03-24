<?php

namespace App\Http\Controllers;

use App\Events\Assigned;
use App\Http\Requests\StoreAssetAssignmentRequest;
use App\Models\Asset;
use App\Models\AssetAssignment;
use App\Models\User;
use Illuminate\Http\Request;

class AssetAssignmentController extends Controller
{


    public function index()
    {
       return  AssetAssignment::all();
    }


    public function assignAsset(StoreAssetAssignmentRequest $request, Asset $asset)
    {
        if (auth()->user()->id == $request->selected_user) {
            return response()->json('You cannot assign your asset to yourself');
        }
     $assign =   $asset->assetAssignment()->create([
            'assigned_by' => auth()->user()->id,
         //selected_user will be the name of the select tag,
         // a foreach of all users should br ran and the value of options should be $assigned_user->id( Selectize Js can do the search sorting)
            'user_id' =>$request->selected_user,
            'due_date' =>$request->due_date
        ]);
     event(new Assigned($assign));
        return response()->json('Asset assigned to user successfully');

    }
    public function update(Request $request, AssetAssignment $assetAssignment)
    {

        $assetAssignment->update($request->all());
        return $assetAssignment;
    }


    public function show(AssetAssignment $assetAssignment)
    {
        return $assetAssignment;
    }




    public function expelUser(AssetAssignment $assetAssignment)
    {
        $assetAssignment->delete();
        return response()->json('User Expelled!!!');
    }
}
