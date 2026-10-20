@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Banner</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('banner.index') }}"> Back</a>
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $banner->name }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <img src="/image/{{ $banner->image }}" width="500px">
                </div>
            </div>
        </div>
        @endauth

        @guest
        <h1>Admin Space</h1>
        <p class="lead">Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection