<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetType;
use App\Models\Incidents;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public $types;
    public function index()
    {
        $this->types = AssetType::get('name', 'id');
        return view('livewire.employee.employee-dashboard-component')->layout('layouts.support-admin-dashboard');

    }

    public function getAsset(Request $request)
    {
        $asset = Asset::where('asset_type_id', $request->asset_type_id)->get('name', 'id');
        return response()->json($asset);
    }

    public function getIncident(Request $request)
    {
        $asset = Incidents::where('asset_id', $request->asset_id)->get('name', 'id');
        return response()->json($asset);
    }
}
