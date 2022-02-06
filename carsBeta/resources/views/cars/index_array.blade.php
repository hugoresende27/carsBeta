@extends('layouts.app')

@foreach ($cars as $c)

    {{-- {{  $c->id }} --}}

@endforeach

@section('content')

<div class="m-auto w-4/5 py-24 ">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold ">
            Cars List
        </h1>
    </div>

    <div class="pt-10">
        <a 
            href="../cars/create"
            class="border-b-2 pb-2 border-dotted italic text-amber-700">
            Add new car &rarr;
        </a>
    </div>


    <div class="py-10 w-5/6">
        <div class="m-auto">
       
                @foreach ($cars as $c)
                    <div class="float-right">
                        <a href="cars//edit"
                           class="border-b-2 border-dotted italic text-green-200"
                           > Edit &rarr; </a>

                           <form action="/cars/" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                    class="border-b-2  border-dotted italic text-red-200"
                                    > DELETE &rarr; </button>

                            </form>
                    </div>

            
                <span class="uppercase text-red-500 font-bold italic">

                    {{  $c['name'] }}

                </span>
                
                <h2 class="decoration-stone-200 text-5xl">
                    {{  $c['founded'] }}
                </h2>
                <p class="text-lg text-gray-700 py-6">
                    {{  $c['description'] }}
                </p>
                <p class="text-lg text-gray-700 py-6">
                    {{  $c['created_at'] }}
                </p>

                <hr class="mt-4 mb-8">
            @endforeach
        </div>

    </div>
</div>

@endsection