<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomePageSetting;
use Illuminate\Http\Request;

class HomePageSettingController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $popularCategorySection = HomePageSetting::where('key', 'popular_category_section')->first();
        return view('admin.home-page-setting.index', compact('categories', 'popularCategorySection'));
    }

    public function updatePopularCategorySection(Request $request)
    {
        // // dd($request->all());
        $request->validate([
            'cat_one' => ['required'],
            'cat_two' => ['required'],
            'cat_three' => ['required'],
            'cat_four' => ['required']

        ], [
            'cat_one.required' => 'Category one filed is required',
            'cat_two.required' => 'Category two filed is required',
            'cat_three.required' => 'Category three filed is required',
            'cat_four.required' => 'Category four filed is required',
        ]);

        // // dd($request->all());
        $data = [
            [
                'category' => $request->cat_one,
                'sub_category' => $request->sub_cat_one,
                'child_category' => $request->child_cat_one,
            ],
            [
                'category' => $request->cat_two,
                'sub_category' => $request->sub_cat_two,
                'child_category' => $request->child_cat_two,
            ],
            [
                'category' => $request->cat_three,
                'sub_category' => $request->sub_cat_three,
                'child_category' => $request->child_cat_three,
            ],
            [
                'category' => $request->cat_four,
                'sub_category' => $request->sub_cat_four,
                'child_category' => $request->child_cat_four,
            ]
        ];

        // dd($data);

        HomePageSetting::updateOrCreate(
            [
                'key' => 'popular_category_section'
            ],
            [
                'value' => json_encode($data)
            ]
        );

        // return redirect()->back()->with('success', 'Popular Category Section Updated Successfully!');
        toastr('Updated successfully!', 'scucess', 'success');
        return redirect()->back();

       
    }



    
}