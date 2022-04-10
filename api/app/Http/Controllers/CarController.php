<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Validation\Rule;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Car::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Requires the acceptance of an application/json header in the receiving application
        $request->validate([
            'name' => 'required|unique:cars|max:20',
            'brand' => 'required',
            'bodytype' => 'required',
            'doors' => 'required',
            'displacement' => 'required',
            'engine_type' => 'required'
        ]);

        return Car::create($request->all());
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

        if(!$car) abort(
            response()->json(['message' => "Couldn't find car with id $id."], 404)
        );

        return $car;
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
        $request->validate([
            'name' => ['required', Rule::unique('cars', 'name')->ignore($id), 'max:20'],
            'brand' => 'required',
            'bodytype' => 'required',
            'doors' => 'required',
            'displacement' => 'required',
            'engine_type' => 'required'
        ]);
        
        $car = Car::find($id);
        $car->update($request->all());
        return $car;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Car::destroy($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */
    public function getByName($name)
    {
        $car = Car::where('name', 'like', '%'.$name.'%')->get();

        if(!$car) abort(
            response()->json(['message' => "Couldn't find car with name $name."], 404)
        );

        return $car;
    }
}
