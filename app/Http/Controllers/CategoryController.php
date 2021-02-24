<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function AllCat(){

        //$categories = Category::all()->paginate(5);
        $categories = DB::table('categories')->latest()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    public function AddCat(Request $request){
        $validated = $request->validate([

            'category_name' => 'required|unique:categories|max:255',
     
        ],
        [
            'category_name.required' => 'Please input Category name',
        ]);

       // dd($validated);

    //    Category::insert([
    //       'category_name' => $request->category_name,
    //       'user_id' => Auth::user() ->id,
    //       'created_at' => Carbon::now() 
    //    ]);

    $category = new Category();
    $category->category_name = $request->category_name;
    $category->user_id = Auth::user() ->id;
    
    $category->save();

    //dd($category);
  
       return Redirect()->back()->with('success' , 'Category Added Successfully');
        
    }
}
