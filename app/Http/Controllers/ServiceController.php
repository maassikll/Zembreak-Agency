<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Service;
use App\Http\Resources\ServiceResource;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = ServiceResource::collection(Service::all());
        return response()->json([
            'status' => true,
            'messgae' => 'Service Table',
            'services' => $services,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        try {
            $validateData = $request->validated();
            $service = Service::create($validateData);
            return response()->json([
                'status' => true,
                'message' => 'Service Created Successfuly',
               'service' =>  $service,
            ], 200);
        } 
        catch (Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th -> getMessage(),
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
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, $id)
    {
        try {
            $service = Service::find($id);
            $validateData = $request->validated();
            $service -> update($validateData);
            return response()->json([
                'status' => true,
                'message' => 'Service Updated Successfuly',
                'service' => $service,
            ], 200);

        } 
        catch (Throwable $th) {
            return response()->json([
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
            $service = Service::destroy($id);
            return response()->json([
                'status' => true,
                'message' => 'Service Deleted Successfuly',
                'service' => $service,], 200);

        } 
        catch (Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th -> getMessage(),
            ],500);
        }

    }

        /**
     * Search the name resource from storage.
     *
     * @param  int $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        $service = Service::where('name','like','%'.$name.'%')->get();
        return response()->json($service, 200);
    }
}

