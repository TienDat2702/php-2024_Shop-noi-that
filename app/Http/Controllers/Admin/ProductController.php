<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\Thumbnails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function add()
    {
        $categories = Category::all();
        return view('admin.products.addproduct', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $product = new Products;
            $name = $request->input('name');
            $price = $request->input('price');
            $quantity = $request->input('quantity');
            if (!$name) {
                throw new \Exception('Tên sản phẩm không được để trống');
            }
            if (!$price) {
                throw new \Exception('Giá sản phẩm không được để trống');
            }
            $product->name = $name;
            $product->category_id = $request->input('category_id');
            $product->price = $price;
            if ($quantity  == null) {
                $quantity = 0;
            }
            $product->price_sale = $request->input('price_sale');
            $product->quantity = $quantity;
            $product->description = $request->input('description');
            $product->content = $request->input('content');
            $product->active = $request->input('active');

            // hình ảnh 
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // lấy tên mở rộng .jpg, .png , .webp, ...
                $filename = time() . '.' . $extension;
                $file->move('uploads/products/', $filename);
                $product->image = $filename;
            }
            $product->save();

            
            // sau khi lưu bảng product thì lấy id ra
            $product_id = $product->id;
            // ảnh phụ
            if ($request->hasFile('thumbnails')) {
                foreach ($request->file('thumbnails') as $thumbnail) {
                    // Tạo một đối tượng Thumbnails mới
                    $thumbnails = new Thumbnails();

                    // Tạo tên file duy nhất
                    $extension = $thumbnail->getClientOriginalExtension();
                    $filename = time() . '_' . uniqid() . '.' . $extension;

                    // Lưu ảnh vào thư mục và tạo đường dẫn
                    $path = 'uploads/thumbnails/' . $filename;
                    $thumbnail->move('uploads/thumbnails', $filename);

                    // Lưu thông tin ảnh vào database
                    $thumbnails->path = $path;
                    $thumbnails->product_id = $product_id;
                    $thumbnails->save();
                }
            }

            Session::flash('success', 'Tạo Sản phẩm thành công');
            return redirect()->back();
            // return response()->json(['success' => true, 'redirect' => route('addproduct')]);
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->back()->withInput();
        }
    }
    public function index()
    {
        $categories = Category::all();
        $products = Products::ProductsList()->paginate(6);
        $thumbnails = Thumbnails::all();
        return view('admin.products.productlist', compact('products', 'thumbnails', 'categories'));
    }
    public function edit($id)
    {
        $categories = Category::all();
        $product = Products::find($id);
        $thumbnails = Thumbnails::all();
        return view('admin.products.editproduct', compact('product', 'thumbnails', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $product = Products::find($id);

        try {
            $name = $request->input('name');
            $price = $request->input('price');
            $quantity = $request->input('quantity');
            if (!$name) {
                throw new \Exception('Tên sản phẩm không được để trống');
            }
            if (!$price) {
                throw new \Exception('Giá sản phẩm không được để trống');
            }
            $product->name = $name;
            $product->category_id = $request->input('category_id');
            $product->price = $price;
            if ($quantity  == null) {
                $quantity = 0;
            }
            $product->price_sale = $request->input('price_sale');
            $product->quantity = $quantity;
            $product->description = $request->input('description');
            $product->content = $request->input('content');
            $product->active = $request->input('active');

            // hình ảnh 
            if ($request->hasFile('image')) {
                $image_old = 'uploads/products/' . $product->image;
                if (File::exists($image_old)) {
                    File::delete($image_old);
                }
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // lấy tên mở rộng .jpg, .png , .webp, ...
                $filename = time() . '.' . $extension;
                $file->move('uploads/products/', $filename);
                $product->image = $filename;
            }
            $product->update();
            // sau khi lưu bảng product thì lấy id ra

            $product_id = $product->id;

            
            // ảnh phụ
            if ($request->hasFile('thumbnails')) {
                foreach ($request->file('thumbnails') as $thumbnail) {
                    // Tạo một đối tượng Thumbnails mới
                    $thumbnails = new Thumbnails();

                    // Tạo tên file duy nhất
                    $extension = $thumbnail->getClientOriginalExtension();
                    $filename = time() . '_' . uniqid() . '.' . $extension;

                    // Lưu ảnh vào thư mục và tạo đường dẫn
                    $path = 'uploads/thumbnails/' . $filename;
                    $thumbnail->move('uploads/thumbnails', $filename);

                    // Lưu thông tin ảnh vào database
                    $thumbnails->path = $path;
                    $thumbnails->product_id = $product_id;
                    // $thumbnails->update();
                    $thumbnails->save();
                }
            }

            // return response()->json(['success' => true, 'redirect' => route('productlist')]);
            Session::flash('success', 'Sửa Sản phẩm thành công');
            return redirect()->route('productlist');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $product = Products::findOrFail($id);
        
        $thumbnails = Thumbnails::where('product_id', $product->id)->get();
        foreach ($thumbnails as $thumbnail) {
            $image_path = 'uploads/thumbnails/' . $thumbnail->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $thumbnail->delete();
        }
    
        $image_path = 'uploads/products/' . $product->image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        
        $product->delete();

        Session::flash('success', 'Xóa sản phẩm thành công');
        return redirect()->route('productlist');
    }
    
    public function deleteOldImage($id)
    {
        // Tìm ảnh cũ bằng id
        $thumbnail = Thumbnails::find($id);
        // Xóa ảnh trong thư mục
        File::delete(public_path($thumbnail->path));
        // Xóa ảnh trong cơ sở dữ liệu
        $thumbnail->delete();
    }
    public function search_admin(Request $request)
    {
        $key = $request->input('key');
        $products = Products::orderBy('id','desc')->where('name', 'LIKE', "%{$key}%")->paginate(9);
        $categories = Category::all();
        $title = '';
        return view('products', compact('products', 'key', 'title', 'categories'));

    }
}
