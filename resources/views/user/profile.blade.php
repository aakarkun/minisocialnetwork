@extends('layouts.app')

<style>
    .profile-img {
        max-width: 150px;
        border: 5px solid #fff;
        border-radius: 100%;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
    }
</style>

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body text-center">

                    <img class="profile-img" src="https://lh3.googleusercontent.com/-17wRgOMqUwA/AAAAAAAAAAI/AAAAAAAAHvc/dff0gtInrOw/s120-p-rw-no/photo.jpg">
                    <h1>{{ $user->name }}</h1>
                    <h5>{{ $user->email }}</h5>
                    {{--<h5>( {{ Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->age }} years old )</h5>--}}
                    <h5>{{ $user->dob->format('l j F Y') }}</h5>
                    <h6>( {{ $user->dob->age }} years old )</h6>
                    <button class="btn btn-primary">Follow</button>
                </div>
            </div>
        </div>
    </div>

@endsection