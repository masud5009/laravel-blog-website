@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Post List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Post</li>
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
                            <h3 class="card-title">Post List</h3>
                            <a href="{{route('post.create')}}" class="btn btn-primary">Add Post</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Author</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if($posts->count())
                          @foreach ($posts as $post)
                          <tr>
                            <td>{{ $post->id }}</td>
                            <td>
                              <div style="max-width: 70px;max-height:70px;overflow:hidden">
                                <img src="{{ asset('storage/post/'.$post->image) }}" class="img-fluid" alt="">
                              </div>
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                              @foreach ($post->tags as $tag)
                                <span class="badge badge-primary">{{ $tag->name }}</span>
                              @endforeach
                            </td>
                            <td>{{ $post->user->name }}</td>
                            <td class="d-flex">
                              <a href="{{ route('post.show',[$post->id])}}" class="btn btn-success mr-1 btn-sm"><i class="fas fa-eye"></i></a>
                              <a href="{{ route('post.edit',[$post->id])}}" class="btn btn-primary mr-1 btn-sm"><i class="fas fa-edit"></i></a>
                              <form action="{{ route('post.destroy',[$post->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger mr-1 btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                              </form>

                            </td>
                          </tr>
                          @endforeach
                          @else
                          <tr>
                            <td colspan="7">
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
