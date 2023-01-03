@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Category List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Category List</h3>
                            <a href="{{route('category.create')}}" class="btn btn-primary">Add Category</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Post count</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if($categories->count())
                          @foreach ($categories as $category)
                          <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->id }}</td>
                            <td class="d-flex">
                              <a href="{{ route('category.edit',[$category->id])}}" class="btn btn-primary mr-1 btn-sm"><i class="fas fa-edit"></i></a>
                              <form action="{{ route('category.destroy',[$category->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger mr-1 btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                              </form>
                              {{-- <a href="{{ route('category.show',[$category->id])}}" class="btn btn-success mr-1 btn-sm"><i class="fas fa-eye"></i></a> --}}
                            </td>
                          </tr>
                          @endforeach
                          @else
                          <tr>
                            <td colspan="5">
                              <h5 class="text-center">No tags found</h5>
                            </td>
                          </tr>
                          @endif
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
          </div>
        </div>
    </div>

    <!--Table-->

@endsection
