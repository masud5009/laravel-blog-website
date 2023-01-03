@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Edit Setting</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-7 col-md-8 offset-md-2 offset-lg-2">
                        <!-- form start -->
                        <form action="{{route('website.setting.update')}}" method="post" enctype="multipart/form-data">
                          @csrf
                            <div class="card-body">
                              @include('includes.errors')
                              <div class="form-group">
                                <label for="name">Site name</label>
                                <input type="text" name="name" class="form-control" value="{{$setting->name}}">
                              </div>
                              <!--image-->
                              <div class="form-group">
                                <div class="row align-center">
                                  <div class="col-8">
                                    <label for="image">Web logo</label>
                                    <div class="custom-file">
                                      <input type="file" name="logo" class="custom-file-input" id="image">
                                      <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                  </div>
                                  <div class="col-4">
                                    <div style="max-width: 100px;max-height:100px;overflow:hidden;margin-left:auto">
                                      <img src="{{asset('storage/setting/'.$setting->web_logo)}}" class="img-fluid" alt="">
                                    </div>
                                  </div>
                                </div>
                              </div>
                               <!--social media ulr-->
                              <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="url" name="twitter" class="form-control" placeholder="Twitter url" value="{{$setting->twitter}}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="url" name="facebook" class="form-control" placeholder="Facebook url" value="{{$setting->facebook}}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input type="url" name="instagram" class="form-control" placeholder="Instagram url" value="{{$setting->instagram}}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Your email" value="{{$setting->email}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="Your address" value="{{$setting->address}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Your conact number" value="{{$setting->phone}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">Contact Email</label>
                                        <input type="email" name="contact_email" class="form-control" placeholder="Your contact email" value="{{$setting->contact_email}}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="copyright">Copyright</label>
                                        <input type="text" name="copyright" class="form-control" value="{{$setting->copyright}}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="reddit">Reddit</label>
                                        <input type="url" name="reddit" class="form-control" placeholder="Reddit url" value="{{$setting->reddit}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Enter description" style="height: 73px;">{{$setting->description}}</textarea>
                                  </div>
                              </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update setting</button>
                            </div>
                            </div>

                          </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
@endsection
