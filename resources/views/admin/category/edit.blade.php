<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Category') }} 
                
            </h2>
        </x-slot>
    <div class="py-12"
        <div class="container">
        <div class="row">
           

    <div class="col-md-4">
        <div class="card">
            <div class="card-header"> Edit a Category:</div>
                <div class="card-body">

               
                <form action="{{url('category/update/'.$categories->id)}} " method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="Categoryname"  class="form-label" placeholder=" Enter category name">Category Name</label>
                        <input type="text" class="form-control" placeholder=" Enter category name" name="category_name" id="categoryname" value="{{$categories->category_name}}">
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
