<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class DeliveryZoneController extends Controller
{
    public function checkDeliveryZone(Request $request)
    {
        // Get lat and lng from the request
        $validatedData = $request->validate([
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ]);

        // Get lat and lng from the request
        $lat = $validatedData['lat'];
        $lng = $validatedData['lng'];

        Log::info('Latitude value: ', ['lat' => $lat]);
        Log::info('Longitude value: ', ['lng' => $lng]);

        // Check if the lat and lng are within any delivery zones
        $zone = DB::table('zone_coordinates')
        ->select('zone_id')
        ->whereRaw("ST_Contains(
            ST_GeomFromText(
                (SELECT CONCAT('POLYGON((',
                    GROUP_CONCAT(CONCAT(lat, ' ', lng) ORDER BY id ASC SEPARATOR ','),
                    ',', 
                    (SELECT CONCAT(lat, ' ', lng) FROM zone_coordinates ORDER BY id ASC LIMIT 1),
                    '))')
                FROM zone_coordinates)
            ), 
            POINT(?, ?)
        )", [$lat, $lng])
        ->limit(1)
        ->first();
    
    

        if ($zone) {
            // Update the session
            Session::put('restaurant', $zone->zone_id);
            Session::put('delivery_address', ['lat' => $lat, 'lng' => $lng]);

            // Return the restaurant
            return response()->json($zone->zone_id);
        } else {
            return response()->json(['error' => 'No delivery zones match this address.'], 400);
        }
    }
}
