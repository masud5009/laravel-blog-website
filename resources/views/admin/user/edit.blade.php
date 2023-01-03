@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Edit user</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('user.index')}}">User List</a></li>
                <li class="breadcrumb-item active">Edit User</li>
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
                            <h3 class="card-title">Edit-User</h3>
                            <a href="{{route('user.index')}}" class="btn btn-primary">Go Back to User List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-8 offset-md-2 offset-lg-3">
                        <!-- form start -->
                        <form action="{{route('user.update',[$user->id])}}" method="post">
                          @csrf
                          @method('put')
                            <div class="card-body">
                              @include('includes.errors')
                              <div class="form-group">
                                <label for="name">User name</label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                              </div>
                              <div class="form-group">
                                <label for="name">User email</label>
                                <input type="email" name="email" class="form-control" value="{{$user->email}}">
                              </div>
                              <div class="form-group">
                                <label for="name">User password <small>(Enter password if you want to change.)</small></label>
                                <input type="password" name="password" class="form-control">
                              </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Update User</button>
                            </div>
                          </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
@endsection
