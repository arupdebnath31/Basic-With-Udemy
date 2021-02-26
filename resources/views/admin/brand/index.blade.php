<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Brands List') }} 
            
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}
<div class="py-12"
    <div class="container">
    <div class="row">
        <div class="col-md-8">

    <div class="card">
        <div class="card-body">

        
            @include('flash-message')   {{-- Flash meddage is a another file which has all the error message stored just @include here tp use those prewritten error message  --}}

            
       

        <div class="card-header"> All Brands</div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">SL.</th>
                <th scope="col">Brand-Name</th>
                <th scope="col">Brand Image</th>
                <th scope="col">Created_At</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)

                <tr>
                    <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
                    <td>{{$brand->brand_name}}</td>
                    <td><img src="/{{$brand->brand_image}}" alt="Brand Image" style="height: 40px; width: 70px; "></td>
                    <td>{{$brand->created_at}}</td>
                    <td>
                         <a href="{{url('/brand/edit/'.$brand->id)}}" class="btn btn-info" >Edit</a>
                         <a href="{{url('/brand/delete/'.$brand->id)}}" onclick="return confirm('Are You sure to delete')" class="btn btn-danger">Delete</a>
                    </td>
                </tr> 
            
                @endforeach 
  
         
                {{--onclick="return confirm('Are You sure to delete')"--}}
         
        </tbody>
        </table>

        {{ $brands->links() }}
       
    </div>
        </div>
    </div>
{{-- add new info --}}
    <div class="col-md-4">
        <div class="card">
            <div class="card-header"> Add a Brand:</div>
            <div class="card-body">

           
            <form action="{{ route('store.brand')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="Brandname"  class="form-label" >Brand Name</label>
                <input type="text" class="form-control" placeholder=" Enter Brand name" name="brand_name" id="categoryname">
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
            
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
        </div>
    </div>
    </div>
    </div>
</div>
</x-app-layout>



</script>
