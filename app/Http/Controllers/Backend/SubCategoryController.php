<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.sub-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'=>['required'],
            'name' => ['required', 'max:200', 'unique:sub_categories,name'],
            'status' =>['required']
        ]);

        $subcategory  = new SubCategory();

        $subcategory->category_id = $request->category;
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($request->name);
        $subcategory->status = $request->status;
        $subcategory->save();

        toastr('Created Successfully', 'success');

        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $subCategory = SubCategory::findOrFail($id);
        return view(' admin.sub-category.edit', compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category'=>['required'],
            'name' => ['required', 'max:200', 'unique:sub_categories,name,'.$id],
            'status' =>['required']
        ]);

        $subcategory  =SubCategory::findOrFail($id);

        $subcategory->category_id = $request->category;
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($request->slug);
        $subcategory->status = $request->status;
        $subcategory->save();

        toastr('Updated Successfully', 'success');

        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory  = SubCategory::findOrFail(id: $id);
        $childCategory = ChildCategory::where('sub_category_id', $subCategory->id)->count();
        if($childCategory>0){
            return response(['status' => 'error', 'message' => 'This item contain child items for delete this, you have to delete the child items first']);
        }
        $subCategory->delete();

        return response(['status' => 'success', 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $category  = SubCategory::findOrFail($request->id);
        $category->status = $request->status == 'true' ? 1 : 0 ;
        $category->save();

        return response(['message' => 'Status has been Updated!' ]);
    }

}