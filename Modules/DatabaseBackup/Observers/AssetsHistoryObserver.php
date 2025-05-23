<?php

namespace Moduels\DatabaseBackup\Observers;

use Auth;
use App\Models\Asset;
use App\Models\AssetsHistory;

class AssetsHistoryObserver
{
    public function created(Asset $asset)
    {
        if (Auth::check()) {
            AssetsHistory::create([
                'asset_id'            => $asset->id,
                'status_id'           => $asset->status_id,
                'location_id'         => $asset->location_id,
                'assigned_user_id'    => $asset->assigned_user_id,
            ]);
        };
    }
    

    public function updated(Asset $asset)
    {
        if (Auth::check()) {
            AssetsHistory::create([
                'asset_id'            => $asset->id,
                'status_id'           => $asset->status_id,
                'location_id'         => $asset->location_id,
                'assigned_user_id'    => $asset->assigned_user_id,
            ]);
        };
    }
}