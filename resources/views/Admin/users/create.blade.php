@extends('layout/admin')
@section('css')
@endsection
@section('content')
@php($url = route('user.get_create'))
@php($is_create = (\Illuminate\Support\Str::contains($url,Request::getRequestUri() )))
@php($is_user =  (isset($user)) ? true : false)
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="home">user</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li> -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
                    <div class="card-header">
                    @if ($is_create)
                        <h5><strong>Thêm mới người dùng</strong></h5>
                    @else
                        <h5><strong>Sửa thông tin người dùng có id = {{$user->id}}</strong></h5>
                    @endif

                    </div>
                    <div class="card-body">
                    @if ($is_create)
                        <form action="{{ route('user.user_create') }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                        @else
                        <form method="POST" role="form" enctype="multipart/form-data" accept-charset="UTF-8" action="{{route('user.get_edit', $user->id)}} ">
                        @endif
                            @csrf
                            <div class="form-group">
                                <label><strong>Tên người dùng <span style="color: red">(*)</span> </strong></label>
                                <input type="text" name="name" class="form-control" value="{{$is_create ? '' : $user->name}}" placeholder="Vui lòng nhập tên người dùng">
                            </div>
                            @if ($is_create)
                            <div class="form-group">
                                    <label for="email">Email<span style="color: red">(*)</span></label>
                                    <input type="email" class="form-control" placeholder="Vui lòng nhập email" name="email" value="{{$is_create ? '' : $user->email}}">
                            </div>
                            @else
                            @endif
                            <div class="form-group">
                            @if ($is_create)
                                <label>Password</label>
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control" type="password" name="password">
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            @else
                            @endif
                            </div>
                            <div class="form-group">
                                <label for="role">Role<span style="color: red">(*)</span></label>
                                <select  name = "role" class="form-control" id="role">
                                    @if ($is_create)
                                        <option value="1">Supper Admin</option>
                                        <option value="2">Admin</option>
                                        <option value="3">Guest</option>
                                    @else
                                        <option value="1" {{$user->role == 1 ? 'selected' : '' }}>Supper Admin</option>
                                        <option value="2" {{$user->role == 2 ? 'selected' : '' }}>Admin</option>
                                        <option value="3" {{$user->role == 3 ? 'selected' : '' }}>Guest</option>
                                    @endif
                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="phone">Số điện thoại<span style="color: red">(*)</span></label>
                                    <input type="text" class="form-control" placeholder="Vui lòng nhập số điện thoại" name="phone" value="{{$is_create ? '' : $user->phone}}">
                                </div>
                                <div class="col">
                                    <label for="address">Địa chỉ<span style="color: red">(*)</span></label>
                                    <input type="text" class="form-control" placeholder="Vui lòng nhập địa chỉ" name="address" value="{{$is_create ? '' : $user->address}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Chọn ảnh <span style="color: red">(*)</span></label>
                                @if ($is_create)
                                <input type="file" name="image" class="form-control-file" id="image">
                                @else
                                <input type="file" name="image" class="form-control-file" id="image">
                                <img style="max-width:150px; height: 50px;" src="{{asset('images/users/'.$user->image)}}">
                                @endif
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-success" name="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection('content')
@push('js')
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' );

    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
    });
</script>


@endpush
