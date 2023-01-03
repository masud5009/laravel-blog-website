@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">User Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('user.index')}}">User List</a></li>
                <li class="breadcrumb-item active">User profile</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">User Profile</h3>
                            {{-- <a href="{{route('user.index')}}" class="btn btn-primary">Go Back to Category List</a> --}}
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-9">
                                    <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                                    {{-- @method('PUT') --}}
                                    @csrf
                                    @include('includes.errors')
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name">User name</label>
                                                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">User emal</label>
                                                    <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">User password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="image">User Image</label>
                                                    <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="image">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>User Description</label>
                                                    <textarea class="form-control" id="description" name="description" rows="5" placeholder="Write your profile description">{{$user->description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-lg btn-primary" type="submit">Update profie</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{asset('storage/user/'.$user->image)}}" alt="" class="img-fluid img-rounded">
                                        <h5>{{$user->name}}</h5>
                                        <p>{{$user->email}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
@endsection
