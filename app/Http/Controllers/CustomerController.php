<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Customer;
use App\Http\Resources\CustomerResource;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $customers = CustomerResource::collection(Customer::all());
       return response()->json([
        'status' => true,
        'message' => 'Customer Table',
        'customers' => $customers
    ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        try{
            $validateData = $request->validated();
            $customer = Customer::create($validatedData);
            return response()->json([
                'status' => true,
                'message' => 'Customer Created Successfuly',
                'customer' => $customer,
            ], 200);
        }
        catch (Throwable $th){
            
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);

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
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        try {
            
            $customer = Customer::find($id);
            $validateData = $request->validated();
            $customer -> update($validateData);
            return response()->json([
                'status' => true,
                'message' => 'Customer Updated Successfuly',
                'customer' => $customer,
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
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
        $customer = Customer::destroy($id);
        return response()->json([
            'status' => true,
            'message' => 'Customer Deleted Successfuly',
            'customer' => $customer
        ],200); 

        }
         catch (Throwable $th) {
            return response->json([
                'status' => false,
                'message'=> $th -> getMessage(),
            ],500);
        
        }
}

       /**
     * Search the company resource from storage.
     *
     * @param  str $company
     * @return \Illuminate\Http\Response
     */
    public function search($company)
    {
        $customer = Customer::where('company','like','%'.$company.'%')->get();
        return response()->json($customer, 200);
    }
    
}
