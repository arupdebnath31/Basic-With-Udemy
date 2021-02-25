<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Category List') }} 
                
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

                
           

            <div class="card-header"> All Category</div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">SL.</th>
                    <th scope="col">Category-Name</th>
                    <th scope="col">User</th>
                    <th scope="col">Created_At</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
              

            @foreach($categories as $cat)

            <tr>
                <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                <td>{{$cat->category_name}}</td>
                <td>{{$cat->user->name}}</td>  
                <td>{{$cat->created_at}}</td>
                <td>
                    <a href="{{url('/category/edit/'.$cat->id)}}" class="btn btn-info">Edit</a>
                    <a href="{{url('/category/delete/'.$cat->id)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr> 
        
            @endforeach   
             
            
             
            </tbody>
            </table>
            {{ $categories->links() }}
        </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header"> Add a Category:</div>
                <div class="card-body">

               
                <form action="{{ route('store.category')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Categoryname"  class="form-label" placeholder=" Enter category name">Category Name</label>
                    <input type="text" class="form-control" placeholder=" Enter category name" name="category_name" id="categoryname">
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
