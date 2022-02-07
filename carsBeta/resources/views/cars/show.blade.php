@extends('layouts.app')

@section('content')

    <div class="m-6 py-24 ">
        <div class="text-center">
            <img src="{{ asset('images/'.$car->image_path) }}" alt="imagemCarro" class="w-3/12 mb-8 shadow-xl">
            <h1 class="text-5xl uppercase bold ">
                {{ $car->name }}
            </h1>
        </div>
        <div class="text-center">
            <a 
            href="/cars"
            class="border-b-2 pb-2 border-dotted italic text-amber-700" >
            Back &larr;
            </a>
        </div>
    <div class="flex justify-center text-white bold text-center">
        <div class="py-10">
            <div class="m-auto bg-red-500">

                    <span class="uppercase text-red-500 font-bold italic">

                        {{ $car->founded }}

                    </span>
                    
            

                    <p class="text-lg text-grey-700 py-6">
                        {{ $car->description }}
                    </p>
                    <p class="text-lg text-white-700 py-6">
                        {{ date('h:i:s'),strtotime($car->created_at) }}
                    </p>
{{-- 
                    <ul>
                        <p class="text-lg text-white">
                            Models:
                        </p>

                        @forelse ($car->carModels as $item)
                           <li class="inline italic px-1 py-6">
                               {{ $item['model_name'] }}
                           </li>
                        @empty
                            <p>No models found</p>
                        @endforelse
                    </ul> --}}

                    <table class="table-auto">
                        <tr class="bg-blue-100">
                            <th class="w-1/4 border-4 border-gray-500 text-black">
                                Model
                            </th>
                            <th class="w-1/4 border-4 border-gray-500 text-black">
                                Engines
                            </th>
                            <th class="w-1/4 border-4 border-gray-500 text-black">
                                Date
                            </th>
                        </tr>

                        @forelse ($car->carModels as $model)
                        <tr>
                            <td class="border-4 broder-gray-500">
                                {{ $model->model_name }}
                            </td>

                            <td class="border-4 broder-gray-500">
                                @foreach ($car->engines as $eng)
                                   @if ($eng->model_id == $model->id) 
                                   &starf;  {{ $eng->engine_name }} 
                                   @endif
                                @endforeach
                            </td>

                            <td class="border-4">
                              
                                {{ date('d-m-Y', strtotime($car->dates->created_at)) }}
                            </td>

                        </tr>
                        @empty
                            <p>
                                No cars Models Found
                            </p>

                        @endforelse
                    </table>

                    <p class="text-left">
                        Product Types:
                        @forelse ($car->products as $prod)
                            {{ $prod->name }}
                        @empty
                            <p>
                                No product
                            </p>
                        @endforelse
                    </p>

                    <hr class="mt-4 mb-8">
            
            </div>

        </div>
    </div>
</div>
@endsection