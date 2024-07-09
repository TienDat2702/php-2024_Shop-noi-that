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
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">@yield('title2')</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th style="width:50px; text-align:center;">ID</th>
                <th>Name</th>
                <th style="width:100px;">Hình ảnh</th>
                <th style="width:0px; text-align:center;">Trạng thái</th>
                <th>Mô tả</th>
                <th style="width:100px; text-align:center;">Thao tác</th>
              </tr>
              </thead>
              <tbody>
                @foreach($category as $parent)
                <tr>
                    <td>{{ $parent->id }}</td>
                    <td>{{ $parent->name }}</td>
                    <td><img width="100px" height="auto" src="{{ asset('uploads/category/'. $parent->image) }}" alt=""></td>
                    @if($parent->active == 0)
                        <td class="text-center"><span style="display: inline-block" class="badge badge-danger p-2">Không hoạt động</span></td>
                    @else
                        <td class="text-center"><span style="display: inline-block" class="badge badge-success p-2">Hoạt động</span></td>
                    @endif
                    <td>{!! $parent->description !!}</td>
                    <td> 
                        <a class="btn btn-primary btn-sm" href="{{ route('editcategory', ['id' => $parent->id]) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete(event, '{{ route('deletecategory', ['id' => $parent->id]) }}')">
                          <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @foreach($parent->children as $child)
                    <tr>
                        <td>{{ $child->id }}</td>
                        <td style="padding-left: 20px;">(con) {{ $child->name }}</td>
                        <td><img width="100px" height="auto" src="{{ asset('uploads/category/'. $child->image) }}" alt=""></td>
                        @if($child->active == 0)
                            <td class="text-center"><span style="display: inline-block" class="badge badge-danger p-2">Không hoạt động</span></td>
                        @else
                            <td class="text-center"><span style="display: inline-block" class="badge badge-success p-2">Hoạt động</span></td>
                        @endif
                        <td>{!! $child->description !!}</td>
                        <td> 
                            <a class="btn btn-primary btn-sm" href="{{ route('editcategory', ['id' => $child->id]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete(event, '{{ route('deletecategory', ['id' => $child->id]) }}')">
                              <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <nav aria-label="Page navigation example">
          <ul class="pagination d-flex justify-content-center my-3">
              {{ $category->appends(request()->all())->links() }}
          </ul>
        </nav>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
