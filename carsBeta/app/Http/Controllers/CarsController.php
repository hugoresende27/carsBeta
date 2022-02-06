<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Product;
use App\Rules\Uppercase;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //SELECT * FROM cars
        //$cars = Car::all()->toArray();
         $cars = Car::all()->toJson();
         $cars = json_decode($cars);

        //apenas name audi
        //$cars = Car::where('name','=','Audi')
        //->get();
        //em vez de get() posso usar 
        //->firstOrFail();

        //$cars = Car::avg('founded');

        //dd($cars);

        // $cars = Car::chunk(2,function ($cars) {
        //     foreach ($cars as $c){
        //         print_r($c);
        //     }
        // });

        //var_dump($cars);
            
        return view('cars.index', [
            'cars'=> $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$car = new Car;
        // $car->name= $request->input('name');
        // $car->founded= $request->input('founded');
        // $car->description= $request->input('desc');
        // $car->save();

        $request->validate([
            'name'=> new Uppercase,
            'founded'=>'required | integer|min:0|max:2021',
            'description'=>'required',
        ]);

        /// se valido executa
        //// senão é válido thorw ValidationException

        $car = Car::create([
            'name'=> $request->input('name'),
            'founded'=> $request->input('founded'),
            'description'=> $request->input('description')
            
        ]);
      
        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $car = Car::find($id);
        //dd($car);
        //dd($car->engines);
        //dd($car->dates);
        //var_dump($car->products);

        $products =  Product::find($id);
        //print_r($products);
        return view('cars.show')->with('car',$car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //dd($id);
        $car = Car::find($id);
        
        return view ('cars.edit')->with('car',$car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $car = Car::where('id',$id)
            ->update([
                'name'=> $request->input('name'),
                'founded'=> $request->input('founded'),
                'description'=> $request->input('desc')        
        ]);
        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    ////FUNÇÃO DESTROY METODO 1////////////////
    // public function destroy($id)
    // {
    //     $car = Car::find($id);

    //     $car->delete();

    //     return redirect ('/cars');
    // }

    ////FUNÇÃO DESTROY METODO 2////////////////
    public function destroy(Car $car)
    {

        $car->delete();

        return redirect ('/cars');
    }
}
