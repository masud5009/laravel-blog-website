@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Add Tag</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('tag.index')}}">Tag List</a></li>
                <li class="breadcrumb-item active">Add Tag</li>
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
                            <h3 class="card-title">Add Tag</h3>
                            <a href="{{route('tag.index')}}" class="btn btn-primary">Go Back to Tag List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-8 offset-md-2 offset-lg-3">
                        <!-- form start -->
                        <form action="{{route('tag.store')}}" method="post">
                          @csrf
                            <div class="card-body">
                              @include('includes.errors')
                              <div class="form-group">
                                <label for="name">Tag name</label>
                                <input type="text" name="name" class="form-control" placeholder="Tag name">
                              </div>
                              <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Enter description" style="height: 73px;"></textarea>
                              </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Add Tag</button>
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
