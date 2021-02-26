  

  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Brand') }} 
            
        </h2>
    </x-slot>
<div class="py-12"
    <div class="container">
    <div class="row">
       

<div class="col-md-4">
    <div class="card">
        <div class="card-header"> Edit a Brand:</div>
            <div class="card-body">

           
            <form action="{{url('brand/update/'.$brands->id)}} " method="POST" enctype="multipart/form-data">
            @csrf
            
            <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">

                <div class="mb-3">
                    <label for="brand_name"  class="form-label" >Brand Name</label>
                    <input type="text" class="form-control" placeholder=" Enter Brand name" name="brand_name" id="categoryname" >
                </div>

                <div class="mb-3">
                    <label for="brand_image"  class="form-label">Brand Image</label>
                    <input type="file" class="form-control" placeholder=" Upload image" name="brand_image" id="categoryname">
                </div>
                <div class="form-group">
                    <img src="{{asset($brands->brand_image)}}" alt="" style="width: 400px; height: 200px;">
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        </div>
    </div>
    </div>
    
</div>
</x-app-layout>
