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
    </div>

 

    <div class="flex justify-center pt-20 text-black bold">

        <form action="/cars" method="POST">
            @csrf
            <input type="text"
                   class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-800" 
                   name="name"
                   id=""
                   placeholder="New car...">

            <input type="text"
                   class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-800" 
                   name="founded"
                   id=""
                   placeholder="Year...">

            <input type="text"
                   class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-800" 
                   name="description"
                   id=""
                   placeholder="Description...">

            <button type="submit" 
                    class="bg-green-800 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold rounded-xl">
                Submit
            </button>

        </form>




    </div>


    @if ($errors->any())
    <div class=" m-auto text-center">
        @foreach ($errors->all() as $item)

            <li class="text-black list-none">
                {{ $item }}
            </li>
            
        @endforeach
    </div>  
    @endif
    
@endsection