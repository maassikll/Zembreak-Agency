<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Person;
use App\Http\Resources\PersonResource;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //$people = Person::get();
         //return $people;
         //return view('people', compact('people'));
         
        $people = PersonResource::collection(Person::all());
        return response()->json([
            'status' => true,
            'message' => 'People Table',
            'people' => $people,
        ], 200);
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePersonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonRequest $request)
    {
        try {

            $validateData = $request->validated();
            $person = Person::create($validateData);
            return response()->json([
                'status' => true,
                'message' => 'Person Created Successfuly',
                'person' => $person,
            ], 200);

        } 
        catch (Throwable $th) {
            return response->json([
                'status' => false,
                'message' => $th->getMessage(),
            ],500);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersonRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonRequest $request, $id)
    {
        try {
            $person = Person::find($id);
            $validateData = $request->validated();
            $person->update($validateData);
            return response()->json([
                'status' => true,
                'message' => 'Person Updated Successfuly',
                'person' => $person,], 200);
        } 
        catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th ->getMessage(),
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $person = Person::destroy($id);
            return response()->json([
                'status' => true,
                'message' => 'Person Deleted Successfuly',
                'person' => $person,
            ], 200);
        } 
        catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ],500);
        }
        
    }

    /**
     * Search for first_name from storage.
     * @param  str $first_name
     * @return \Illuminate\Http\Response
     */

    public function search($first_name){
        $person = Person::where('first_name','like','%'.$first_name.'%')->get();
        return response()->json($person, 200);
    }


}
