@extends('admin.layout')
@section('open', 'menu-is-opening menu-open')
@section('active', 'active')
@section('title', 'Danh sách sản phẩm')
@section('titlepage', 'Sản phẩm')
@section('title2', 'Danh sách sản phẩm')
@section('content')
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
            @include('admin.alert')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">@yield('title2')</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th style="width: 10px">ID</th>
                    <th style="width: 200px">Tên</th>
                    <th>Ảnh</th>
                    <th style="width: 129px">Ảnh phụ</th>
                    <th style="width: 120px">Giá</th>
                    <th style="width: 120px">Giá giảm</th>
                    <th>Danh mục</th>
                    <th>Số lượng</th>
                    {{-- <th>Mô tả</th>
                    <th>Mô tả chi tiết</th> --}}
                    <th>Lượt xem</th>
                    <th>Lượt Mua</th>
                    <th>Trạng thái</th>
                    <th style="width: 100px">Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach ($products as $product)
                  <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td><img width="100px" height="auto" src="{{ asset('uploads/products/'. $product->image) }}" alt=""></td>
                       
                    <td>
                      @foreach ($thumbnails->where('product_id', $product->id) as $thumbnail)  
                      <img width="50px" height="auto" src="{{ asset($thumbnail->path) }}" alt="">
                      @endforeach
                    </td>
                   
                    <td>{{0 + $product->price}} đ</td>
                    <td>{{0 + $product->price_sale}} đ</td>

                    @php
                    $category = $categories->where('id', $product->category_id)->first();
                    @endphp
                    
                    @if ($category)
                        <td>{{ $category->name }}</td>
                    @else
                        <td>Chưa có danh mục</td>
                    @endif
                    
                    <td>{{$product->quantity}}</td>
                    
                    <td>{{$product->view}}</td>
                    <td>{{$product->sold}}</td>
                    @if ($product->active == 1)
                      <td><span style="display: inline-block" class="badge badge-success p-2">Hoạt động</span></td>
                    @else
                    <td><span style="display: inline-block" class="badge badge-danger p-2">Không hoạt động</span></td>
                    @endif
                    <td>
                      <a class="btn btn-primary btn-sm" href="{{ route('editproduct', ['id' => $product->id]) }}">
                        <i class="fas fa-edit"></i>
                      </a>

                      {{-- <a href="{{ route('deleteproduct', ['id' => $product->id]) }}" class="btn btn-danger btn-sm">
                          <i class="fas fa-trash"></i>
                      </a> --}}
                      {{-- <form class="delete" action="{{ route('deleteproduct', ['id' => $product->id]) }}" method="POST" onsubmit="return confirmDelete()">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i></button>
                      </form> --}}
                      <button class="btn btn-danger btn-sm" onclick="confirmDelete(event, '{{ route('deleteproduct', ['id' => $product->id]) }}')">
                        <i class="fas fa-trash"></i>
                    </button>
                    </td>                    
                  </tr>
                @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            
            <nav aria-label="Page navigation example">
              <ul class="pagination d-flex justify-content-center my-3">
                  {{ $products->appends(request()->all())->links() }}
              </ul>
            </nav>

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