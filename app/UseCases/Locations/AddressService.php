<?php

namespace App\UseCases\Locations;

use App\Models\State;
use Geocoder\Laravel\Facades\Geocoder;
use Illuminate\Support\Facades\DB;

class AddressService
{
    /**
     * @param $latitude
     * @param $longitude
     */
    public function addressCreate($latitude, $longitude)
    {
        $reverse = Geocoder::reverse($latitude, $longitude)->get();
        $relevant = $reverse[0];

        foreach($reverse as $rev){
            if('ROOFTOP' == $rev->getLocationType()){
                $relevant = $rev;
            }
        }

        $state = State::updateOrCreate([
            'name' => $relevant->getAdminLevels()
                ->first()
                ->getName()
        ]);

        $state->addresses()->create([
            'coordinate' => DB::raw("ST_GeomFromText('POINT($latitude $longitude)')"),
            'street' => ($relevant->getStreetNumber() ?? '') . $relevant->getStreetName(),
            'city' => $relevant->getLocality(),
            'state_id' => $state->id,
        ]);
    }

}
