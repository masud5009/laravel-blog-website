@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Edit post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post List</a></li>
                <li class="breadcrumb-item active">Edit post</li>
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
                            <h3 class="card-title">Edit-Post</h3>
                            <a href="{{route('post.index')}}" class="btn btn-primary">Go Back to Post List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-8 offset-md-2 offset-lg-3">
                        <!-- form start -->
                        <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                          @method('PUT')
                          @csrf
                            <div class="card-body">
                              @include('includes.errors')

                              <div class="form-group">
                                <label for="title"> Post Title</label>
                                <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Enter title">
                              </div>
                              <div class="form-group">
                                <label for="post">Select post</label>
                                <select name="category" id="category" class="form-control">
                                  @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if($post->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <div class="row align-center">
                                  <div class="col-8">
                                    <label for="image">Post Image</label>
                                    <div class="custom-file">
                                      <input type="file" name="image" class="custom-file-input" id="image">
                                      <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                  </div>
                                  <div class="col-4">
                                    <div style="max-width: 100px;max-height:100px;overflow:hidden;margin-left:auto">
                                      <img src="{{ asset('storage/post/'.$post->image) }}" class="img-fluid" alt="">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Choose Post Tags</label>
                                <div class="d-flex flex-wrap">
                                @foreach ($tags as $tag)
                                <div class="custom-control custom-checkbox" style="margin-right: 20px">
                                    <input class="custom-control-input" type="checkbox" name="tags[]" id="tag{{ $tag->id}}" value="{{ $tag->id }}"
                                      @foreach ($post->tags as $t)
                                          @if($tag->id == $t->id) checked @endif
                                      @endforeach
                                    >
                                    <label for="tag{{ $tag->id}}" class="custom-control-label">{{ $tag->name }}</label>
                                  </div>
                                @endforeach
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter description" style="height: 73px;">
                                  {{ $post->description }}
                                </textarea>
                              </div>
                              <div class="">
                                <button type="submit" class="btn btn-primary">Update post</button>
                              </div>
                            </div>
                            <!-- /.card-body -->
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
@section('style')
<link rel="stylesheet" href="{{ asset('admin/css/summernote-bs4.min.css')}}">
@endsection
@section('script')
<script src="{{ asset('admin/js/summernote-bs4.min.js')}}"></script>
<script>
  $('#description').summernote({
    placeholder: 'Hello Bootstrap 4',
    tabsize: 2,
    height: 100
  });
</script>
@endsection
