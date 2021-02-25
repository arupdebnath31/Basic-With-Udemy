<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
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

    $brand_image = $request->file('brand_image'); //request image captured by the $brand_image
    $name_gen = hexdec(uniqid());
    $image_extension = strtolower($brand_image -> getClientOriginalExtension());
    $image_name = $name_gen.'.'.$image_extension;
    $up_location = 'image/brand/';
    $last_img = $up_location.$image_name;
    $brand_image->move($up_location,$image_name);

    Brand::insert(
        [
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at'  => Carbon::now(),
        ]);

       return Redirect()->back()->with('success' , 'Brand Added Successfully');
    }


    public function Edit($id){
        return view('admin.brand.edit');
    }
}
