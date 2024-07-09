@extends('admin.layout')
@section('title', 'Chỉnh sửa sản phẩm')
@section('titlepage', 'Chỉnh sửa sản phẩm')
@section('title2', 'Chỉnh sửa sản phẩm')
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
                    {{-- thông báo lỗi --}}
                    @include('admin.alert')
                    {{-- end thông báo lỗi --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">@yield('title2')</h3>
                        </div>
                        <form id="adminForm" action="{{ route('updateproduct', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="name">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm" value="{{ $product->name }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="category">Danh mục</label>
                                        <select class="custom-select form-control-border" id="category" name="category_id">
                                            <option value="" {{ $product->category_id == NULL ? 'selected' : ''}}>none</option>
                                            @foreach ($categories as $ct)
                                                <option value="{{$ct->id}}" {{ $product->category_id == $ct->id ? 'selected' : ''}}>{{$ct->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="price">Giá gốc</label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Giá sản phẩm" value="{{ $product->price }}">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="price_sale">giảm giá</label>
                                        <input type="text" class="form-control" id="price_sale" name="price_sale" placeholder="Nhập Giá giảm" value="{{ $product->price_sale }}">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="quantity">Số lượng</label>
                                        <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Nhập số lượng" value="{{ $product->quantity }}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Mô tả ngắn</label>
                                        <textarea name="content" class="form-control">{{ $product->content }}</textarea>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Mô tả chi tiết</label>
                                        <textarea id="ckeditor" name="description" class="form-control">{{ $product->description }}</textarea>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="exampleInputFile">Hình ảnh</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input id="upload" type="file" class="custom-file-input" name="image" id="image">
                                                <label class="custom-file-label" for="upload">Chọn hình ảnh</label>
                                            </div>
                                        </div>
                                        <img class="my-3" width="200px" id="image_old" src="{{ asset('uploads/products/'. $product->image) }}" alt="Hình ảnh" style="max-width: 100%;">
                                        <img class="my-3" width="200px" id="imagePreview" src="" alt="Hình ảnh" style="max-width: 100%; display: none;">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="exampleInputFile">Hình ảnh chi tiết</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input id="upload-thumpnails" type="file" class="custom-file-input" name="thumbnails[]" id="thumbnails" multiple>
                                                <label class="custom-file-label" for="upload-thumpnails">Chọn hình ảnh</label>
                                            </div>
                                        </div>
                                        <div style="width: 100%" id="selected-images" class="row">
                                            @foreach ($thumbnails->where('product_id', $product->id) as $thumbnail)
                                                <img class="m-3 thumbnail_old" data-id="{{ $thumbnail->id }}" width="200px" src="{{ asset($thumbnail->path) }}" alt="Hình ảnh" style="max-width: 100%;">
                                            @endforeach
                                        </div>
                                                                             
                                    </div>
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
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button id="submitForm" type="submit" class="btn btn-primary">Thêm</button>
                            </div>
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
@endsection
