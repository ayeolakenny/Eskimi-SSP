<?php

namespace App\Http\Controllers;

use App\Http\Resources\CampaignResource;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    // get all campaigns listing
    public function index()
    {
        return CampaignResource::collection(Campaign::all());
    }

    // create a new campaign
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'from' => 'required',
            'to' => 'required',
            'daily_budget' => 'required',
            'total_budget' => 'required',
            'uploads' => 'required'
        ]);

        $imagesToBeSaved = array();

        foreach ($request->uploads as $image) {
            $filename = date('mdYHis') . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path('public/storage/uploads'), $filename);
            $formatted = 'storage/uploads/' . $filename;
            array_push($imagesToBeSaved, $formatted);
        };
        return Campaign::create([
            'name' => $request->name,
            'from' => $request->from,
            'to' => $request->to,
            'total_budget' => $request->total_budget,
            'daily_budget' => $request->daily_budget,
            'status' => 1, // status is active on creation
            'uploads' => json_encode($imagesToBeSaved)
        ]);
    }

    public function show($campaignId)
    {
        return new CampaignResource(Campaign::findOrFail($campaignId));
    }

    public function update(Request $request, $campaignId)
    {
        $campaign = new CampaignResource(Campaign::findOrFail($campaignId));
        $campaign->update($request->all());
        return $campaign;
    }
}
