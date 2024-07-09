<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    
    //CRUD
    // them danh muc - Create
    public function add()
    {
        $category = Category::getParent()->get();
        return view('admin.categories.addcategory', compact('category'));
    }

    public function store(Request $request)
    {
        $unique_name = Category::where('name', $request->input('name'))->first();
        try {
            $category = new Category; // tạo đối tượng gán class Category trong model
            $name = $request->input('name');
            $description = $request->input('description');
            // $image = $request->file('image');
            if (!$name) {
                throw new \Exception('Tên danh mục không được để trống');
            }
            if($unique_name){
                throw new \Exception('Tên danh mục không được trùng');
            }
            $category->name = $name;
            $category->parent_id = $request->input('parent_id');
            $category->description = $description;
            $category->hot = $request->input('hot');
            $category->active = $request->input('active');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // lấy tên mở rộng .jpg, .png , .webp, ...
                $filename = time() . '.' . $extension;
                $file->move('uploads/category/', $filename);
                $category->image = $filename;
            }
            $category->save();
            Session::flash('success', 'Tạo danh mục thành công');
            return redirect()->back();
            // return response()->json(['success' => true, 'redirect' => route('addcategory')]);
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->back();
        }
    }

    // list danh muc - React
    public function index()
    {
        // $category = Category::CategoriesList()->paginate(4);
        $category = Category::where('parent_id', 0)->with('children')->paginate(4);
        return view('admin.categories.categorylist', compact('category'));
    }

    // sua danh muc - Update 
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::getParent()->get();
        return view('admin.categories.editcategory', compact('category', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        try {
            $name = $request->input('name');
            // $image = $request->file('image');
            if (!$name) {
                throw new \Exception('Tên danh mục không được để trống');
            }
            $category->name = $name;
            $category->parent_id = $request->input('parent_id');
            $category->description = $request->input('description');
            $category->hot = $request->input('hot');
            $category->active = $request->input('active');
            if ($request->hasFile('image')) {
                // có file đính kèm trong form update thì tìm file cũ xóa đi
                // nếu trc đó k có ảnh đại diện cũ thì k xóa
                $image_old = 'uploads/category/' . $category->image;
                if (File::exists($image_old)) {
                    File::delete($image_old);
                }
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // lấy tên mở rộng .jpg, .png , .webp, ...
                $filename = time() . '.' . $extension;
                $file->move('uploads/category/', $filename);
                $category->image = $filename;
            }
            $category->update();

            Session::flash('success', 'Cập nhật danh mục thành công');
            return redirect()->route('categorylist');
            // return response()->json(['success' => true, 'redirect' => route('categorylist')]);
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->back();
        }
    }

    // xoa danh muc - Delete
    public function delete($id)
    {
        $category = Category::find($id);    
        // nếu trc đó k có ảnh đại diện cũ thì k xóa
        $image_old = 'uploads/category/' . $category->image;
        if (File::exists($image_old)) {
            File::delete($image_old);
        }
        Category::where('parent_id', $category->id)->delete();
        $category->delete();
        Session::flash('success', 'Xóa danh mục thành công');
        return redirect()->route('categorylist');
    }
}
