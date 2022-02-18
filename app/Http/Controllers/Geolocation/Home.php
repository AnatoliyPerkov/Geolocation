<?php

namespace App\Http\Controllers\Geolocation;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Repositories\AddressRepository;
use App\UseCases\Locations\AddressService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Home extends Controller
{
    private AddressService $service;
    private AddressRepository $addressRepository;

    /**
     * Home constructor.
     * @param AddressService $service
     * @param AddressRepository $repository
     */
    public function __construct(AddressService $service, AddressRepository $repository)
    {
        $this->service = $service;
        $this->addressRepository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * @param AddressRequest $request
     * @return RedirectResponse
     */
    public function locationCreate(AddressRequest $request)
    {
        $latitude = $request->input('lat');
        $longitude = $request->input('lng');

        try {
             $this->service->addressCreate($latitude, $longitude);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
        return redirect()->route('home');

    }

    /**
     * @return string
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function getAllLocations()
    {
        $locations = $this->addressRepository->allLocations();
        if (!$locations){
            abort(404);
        }
        return $locations;
    }

    /**
     * @param Request $stateId
     * @return RedirectResponse|void
     */
    public function getStateAddresses(Request $stateId)
    {
        $state = $stateId->input('state');
        if ($state){
            $addresses = $this->addressRepository->stateAddresses($state);
        }else{
            return back()
                ->withErrors(['massage' => "state id=[{$stateId}] not found!"])
                ->withInput();
        }
        return $addresses;
    }

}
