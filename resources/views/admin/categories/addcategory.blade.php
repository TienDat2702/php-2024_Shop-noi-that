@extends('admin.layout')
@section('open', 'menu-is-opening menu-open')
@section('ac-active', 'active')
@section('title', 'Thêm danh mục')
@section('titlepage', 'Thêm Danh mục')
@section('title2', 'Thêm danh mục')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('titlepage')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">@yield('titlepage')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            @include('admin.alert')

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">@yield('title2')</h3>
              </div>
              <form id="adminForm" action="{{ route('addcategory') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="category">Tên Danh Mục</label>
                    <input type="text" name="name" class="form-control" id="category" placeholder="Nhập tên danh mục ">
                  </div>    
                    <div class="form-group">
                      <label>Danh Mục</label>
                      <select name="parent_id" class="custom-select form-control-border" placeholder="Nhập danh mục">
                          <option value="0">None</option>
                          @foreach ($category as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endforeach

                      </select>
                  </div>
                  <div class="form-group col-12">
                    <label>Mô tả chi tiết</label>
                    <textarea id="ckeditor" name="description" class="form-control"></textarea>
                </div>
                  <div class="form-group col-12">
                    <label>Hot</label>
                    <input type="number" id="hot" name="hot" class="form-control" placeholder="Nhập số lượng để tăng độ hot"></input>
                </div>
                <div class="form-group">
                  <label for="upload">Hình ảnh</label>
                  <input type="file" id="upload" class="form-control" name="image">
                  <img width="150px" id="imagePreview" src="" alt="Hình ảnh" style="max-width: 100%; display: none;">
                </div>
                  {{-- <input type="file" id="upload" class="form-control" name="image">
                  <img id="imagePreview" src="" alt="Hình ảnh" style="max-width: 100%; display: none;"> --}}
                  <div class="form-group">
                    <label>Kích Hoạt</label>
                    <div class="form-check">
                        <input class="form-check-input" value="1" type="radio" id="active" name="active" checked="">
                        <label for="active" class="form-check-label">Có</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="0" id="no_active" type="radio" name="active">
                        <label for="no_active" class="form-check-label">Không</label>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button id="submitForm" type="submit" class="btn btn-primary">Tạo</button>
              </div>

                @csrf
              
              </form>
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

  </div>
  @endsection