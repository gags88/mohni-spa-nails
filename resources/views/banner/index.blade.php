@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Dashboard</h1>
        @section('content')
            <div class="row">
                <div class="col-lg-12 margin-tb my-2">
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('banner.create') }}"> Add New Banner</a>
                    </div>
                </div>
            </div>
           
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <span>{{ $message }}</span>
                </div>
            @endif
           
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($banners as $banner)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td><img src="/image/{{ $banner->image }}" width="100px"></td>
                    <td>{{ $banner->name }}</td>
                    <td>
                        <form action="{{ route('banner.destroy',$banner->id) }}" method="POST">
                            <!--<a class="btn btn-info" href="{{ route('banner.show',$banner->id) }}">Show</a>-->
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
          
            {!! $banners->links() !!}
              
        @endsection
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection
