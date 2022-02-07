@extends('layouts.app')


@section('content')

    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <div class="text-5xl uppercase bold">
                Create Car
          
            </div>
            <a 
            href="/cars"
            class="border-b-2 pb-2 border-dotted italic text-amber-700">
            Back &larr;
        </a>
        </div>
        @if ($errors->any())
        <div class="w-1/2 mt-6  m-auto text-center">
            @foreach ($errors->all() as $erro)
    
                <li class="bg-red-500 text-white list-none text-center">
                    {{ $erro }}
                </li>
                
            @endforeach
        </div>  
        @endif
    </div>


    <div class="flex justify-center pt-5 text-black bold">

        <form action="/cars" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="image">Image</label>
            <input type="file"
                   class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-800" 
                   name="image"
                   id="image"
                   
                   value={{ old('image') }}
                   >

            <label for="name">Name</label>
            <input type="text"
                   class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-800" 
                   name="name"
                   id="name"
                   placeholder="New car..."
                   value={{ old('name') }}
                   >

            <label for="founded">Year</label>
            <input type="text"
                   class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-800" 
                   name="founded"
                   id="founded"
                   placeholder="Year..."
                   value={{ old('founded') }}
                   >

            <label for="description">Description</label>
            <input type="text"
                   class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-800" 
                   name="description"
                   id="description"
                   placeholder="Description..."
                   value={{ old('description') }}
                   >

            <button type="submit" 
                    class="text-white bg-green-800 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold rounded-xl">
                Submit
            </button>

        </form>




    </div>


  
    
@endsection