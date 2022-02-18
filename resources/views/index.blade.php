@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card col-lg-6">
            @if ($errors->any())
                <div class="alert alert-danger p-2">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form class="card-body" action="{{route('home.locationCreate')}}" method="POST">
            @csrf
            <input class="form-control col-lg-2 m-2" type="text" name="lat" placeholder="latitude">
            <input class="form-control col-lg-3 m-2" type="text" name="lng" placeholder="longitude">
            <button class="btn btn-primary float-end mt-2" type="submit">Send</button>
        </form>
        </div>
        <div class="card col-lg-6">
            <div class="card-body">
                <form class="card-body" action="{{route('home.state.addresses')}}" method="GET">
                    @csrf
                    <input class="form-control col-lg-2 m-2" type="text" name="state" placeholder="ID">
                    <button class="btn btn-primary float-end mt-2" type="submit">Find</button>
                </form>
            </div>
            <a href="{{route('home.locations')}}" class="btn btn-primary float-end mt-2 mb-2 " type="button">Get All</a>
        </div>
    </div>
@endsection
