<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Console\DumpCommand;

class BrandController extends Controller
{
    public function AllBrand(){
        
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index' ,compact('brands'));
    }

    public function StoreBrand(Request $request){

        //dd($request);
        
        $validated = $request->validate([

            'brand_name' => 'required|unique:brands|max:255',
            'brand_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
     
        ],
        [
            'brand_name.required' => 'Please input Category name',
            'brand_name.requires.image' => 'please insert a image',
        ]);



    //     $brand = new Brand();
    //     $brand->brand_name = $request->brand_name;
    //     //$brand->user_id = Auth::user() ->id;
        
    //     $brand->save();
    
    // //dd($category);


    $brand_image = $request->file('brand_image');

    

  
       return Redirect()->back()->with('success' , 'Brand Added Successfully');
    }
}
