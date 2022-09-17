<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Employe;
use App\Http\Resources\EmployeResource;
use App\Http\Requests\StoreEmployeRequest;
use App\Http\Requests\UpdateEmployeRequest;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = EmployeResource::collection(Employe::all());
        return response()->json([
            'status' => true,
            'message' => 'Employe Table',
            'employes' => $employes,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeRequest $request)
    {
        try {
            
        $validateData = $request->validated();
        $employe = Employe::create($validateData);
        return response()->json([
            'status' => true,
            'message' => 'Employe Created Succesfuly',
            'employe' => $employe,
        ], 200);

        } 
        catch (Throwable $th) {
            return response()->json([
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
     * @param  \App\Http\Requests\UpdateEmployeRequest  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeRequest $request, $id)
    {
        try {
            $employe = Employe::find($id);
            $validateData = $request->validated();
            $employe->update($validateData);
            return response()->json([
                'status' => true,
                'message' => 'Employe Updated Successfuly',
                'employe' => $employe,
            ], 200);

        } 
        catch (Throwable $th) {
            return response->json([
                'status' => false,
                'message' => $th -> getMessage(),
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
            $employe = Employe::destroy($id);
            return response()->json([
                'status' => true,
                'message' => 'Employe Deleted Successfuly',
                'employe' => $employe,
            ], 200);
        } 
        catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessge(),
            ],500);
        }
        
    }

        /**
     * search the services resource from storage.
     *
     * @param  str $services
     * @return \Illuminate\Http\Response
     */
    public function search($services)
    {
        $employe = Employe::where('services','like','%'.$services.'%')->get();
        return response()->json($employe, 200);
    }


}
