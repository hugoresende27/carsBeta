@extends('layouts.app')


@section('content')

<div class="m-auto w-4/5 py-24 ">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold ">
            Cars List
        </h1>
    </div>

    @if (Auth::user())

        <div class="pt-10">
            <a 
                href="../cars/create"
                class="border-b-2 pb-2 border-dotted italic text-amber-700">
                Add new car &rarr;
            </a>
        </div>
    @else

    <p>Please login</p>
        
    @endif
  


    <div class="py-10 w-5/6">
        <div class="m-auto">
          {{-- {{ dd(Auth::user()) }} --}}
                @foreach ($cars as $item)
            {{-- {{ dd(auth()) }} --}}
                @if (isset(Auth::user()->id) && Auth::user()->id == $item->user_id)


                    <div class="float-right bg-blue-800 p-3">
                        <a href="cars/{{ $item->id }}/edit"
                        class="border-b-2 border-dotted italic text-green-200"
                        > Edit &rarr; </a>

                        <form action="/cars/{{ $item->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                    class="border-b-2  border-dotted italic text-red-200"
                                    > DELETE &rarr; </button>

                            </form>
                    </div>


                @endif
                 

            
                <span class="uppercase text-red-500 font-bold italic">

                    {{ $item->founded }}

                </span>
                
                <h2 class="decoration-stone-200 text-5xl hover:text-red-500">
                    <a href="/cars/{{ $item->id }}">
                        {{ $item->name }}
                    </a>
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