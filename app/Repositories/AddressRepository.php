<?php

namespace App\Repositories;

use App\Models\State as Model;
use Illuminate\Support\Facades\DB;

class AddressRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return string
     */
    public function allLocations()
    {
        return DB::table('addresses')
            ->join('states', 'states.id', '=', 'addresses.state_id')
            ->select('name','street','city')
            ->selectRaw('ST_X(coordinate) AS "latitude",ST_Y(coordinate) AS "longitude"')
            ->get()
            ->toJson();

    }

    /**
     * @param $id
     * @return mixed
     */
    public function stateAddresses($id)
    {
        $address = $this->startConditions()->findOrFail($id);
        return $address->addresses()
            ->select('street','city')
            ->selectRaw('ST_X(coordinate) AS "latitude",ST_Y(coordinate) AS "longitude"')
            ->get()
            ->toJson();
    }
}
