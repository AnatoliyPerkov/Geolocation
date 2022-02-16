<?php

namespace App\Http\Controllers\Geolocation;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Spatie\Geocoder\Geocoder;

class Home extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();

        $geocoder = new Geocoder($client);

        $geocoder->setApiKey(config('geocoder.key'));

        $geocoder->setCountry(config('geocoder.country', 'US'));

        $geocoder->getCoordinatesForAddress('Infinite Loop 1, Cupertino');
dd($geocoder->getCoordinatesForAddress('Infinite Loop 1, Cupertino'));
        /*
          This function returns an array with keys
          "lat" =>  37.331741000000001
          "lng" => -122.0303329
          "accuracy" => "ROOFTOP"
          "formatted_address" => "1 Infinite Loop, Cupertino, CA 95014, USA",
          "viewport" => [
            "northeast" => [
              "lat" => 37.3330546802915,
              "lng" => -122.0294342197085
            ],
            "southwest" => [
              "lat" => 37.3303567197085,
              "lng" => -122.0321321802915
            ]
          ]
        */
        return view('index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
