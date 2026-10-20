@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <div class="row">
            <div class="col-lg-12 pb-5">
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('banner.index') }}"> Go back</a>
                </div>
            </div>
        </div>
       
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
       
        <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 pt-3">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="file" name="image" class="form-control" placeholder="image">
                        <small>Please make sure banner dimensions are atleast 7208px X 2812px</small>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 pt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
           
        </form>
        @endauth

        @guest
        <h1>Admin Space</h1>
        <p class="lead">Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection