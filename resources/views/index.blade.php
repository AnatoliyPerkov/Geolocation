@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card col-lg-6">
        <form class="card-body" action="#">
            <input class="form-control col-lg-2 m-2" type="number" name="lat" placeholder="latitude">
            <input class="form-control col-lg-3 m-2" type="number" name="lng" placeholder="longitude">
            <button class="btn btn-primary float-end mt-2" type="submit" >Send</button>
        </form>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

@endsection
