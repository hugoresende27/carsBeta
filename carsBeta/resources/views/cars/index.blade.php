@extends('layouts.app')


@section('content')

<div class="m-auto w-4/5 py-24 ">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold ">
            Cars
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
            <h1>Lista</h1>
                @foreach ($cars as $item)
                    
            
                <span class="uppercase text-red-500 font-bold italic">

                    {{ $item->founded }}

                </span>
                
                <h2 class="decoration-stone-200 text-5xl">
                    {{ $item->name }}
                </h2>
                <p class="text-lg text-gray-700 py-6">
                    {{ $item->description }}
                </p>
                <p class="text-lg text-gray-700 py-6">
                    {{ date('h:i:s'),strtotime($item->created_at) }}
                </p>

                <hr class="mt-4 mb-8">
            @endforeach
        </div>

    </div>
</div>

@endsection