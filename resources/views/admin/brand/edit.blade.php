  

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

           
            <form action="{{url('brand/update/')}} " method="POST">
            @csrf
                <div class="mb-3">
                    <label for="Categoryname"  class="form-label" placeholder=" Enter category name">Brand Name</label>
                    <input type="text" class="form-control" placeholder=" Enter category name" name="category_name" id="categoryname" value="">
                </div>

                <div class="mb-3">
                    <label for="Categoryname"  class="form-label" placeholder=" Enter category name">Brand Image</label>
                    <input type="file" class="form-control" placeholder=" Upload image" name="brand_image" id="categoryname">
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
