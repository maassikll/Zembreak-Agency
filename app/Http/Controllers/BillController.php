<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Bill;
use LaravelDaily\Invoices\Invoice;
use App\Http\Resources\BillResource;
use App\Http\Requests\StoreBillRequest;
use App\Http\Requests\UpdateBillRequest;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;


class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = BillResource::collection(Bill::all());
        return response()->json([
            'status' => true,
            'message' =>'Bill Table',
            'bills'=>$bills         
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBillRequest $request)
    {

        try {  
        $validateData = $request->validated();
        $bill = Bill::create($validateData);
        return response()->json([
            'status' => true,
            'message' => 'Bill Stored Successfuly',
            'bill' => $bill
        ], 200);

        } 
        catch (Throwable $th) {
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
               
        // $invoice = Bill::all();
        // dd($invoices->projects->services->name);

        $invoices = Bill::find($id);

         if(isset($invoices)){

             $first_name_employe = $invoices->employes->person->first_name;
             $last_name_employe = $invoices->employes->person->last_name;
             $employe_id = $invoices->employes->id;
             $email_employe = $invoices->employes->person->email;
             $phone_employe = $invoices->employes->person->phone;
             $first_name_customer = $invoices->projects->customers->person->first_name;
             $last_name_customer = $invoices->projects->customers->person->last_name;
             $adress_customer = $invoices->projects->customers->person->adress;
             $customer_id = $invoices->projects->customers->id;
             $phone_customer =$invoices->projects->customers->person->phone;
             $email_customer = $invoices->projects->customers->person->email;
     
             $client = new Party([
                 'name'          => $first_name_employe.' '.$last_name_employe,
                 'email'         => $email_employe,
                 'phone'         => $phone_employe,
                 'custom_fields' => [
                     'business id' => $employe_id.'#FF',
                     'email'         => $email_customer,
                 ],
             ]);
     
             $customer = new Party([
                 'name'          =>  $first_name_customer.' '.$last_name_customer,
                 'address'       => $adress_customer,
                 'phone'         => $phone_customer,
                 
                 'custom_fields' => [   
                     'email'         => $email_customer,
                 ],
             ]);

                 $items = [
                     (new InvoiceItem())
                         ->title($invoices->projects->services->name)
                         ->description($invoices->projects->services->description)
                         ->pricePerUnit($invoices->amount),
                          
                 ];


     
             $invoice = Invoice::make('Invoice')
                 ->series('MGS')
                 // ability to include translated invoice status
                 // in case it was paid
                 ->status(__('invoices::invoice.paid'))
                 ->sequence($id)
                 ->serialNumberFormat('{SEQUENCE}/{SERIES}')
                 ->seller($client)
                 ->buyer($customer)
                 ->date($invoices->created_at)
                 ->dateFormat('d/m/Y h:m:s')
                 ->payUntilDays($invoices->projects->estimed_date)
                 ->currencySymbol(' DZ')
                 ->currencyCode('DZD')
                 ->currencyFormat('{VALUE}{SYMBOL}')
                 ->currencyThousandsSeparator('.')
                 ->currencyDecimalPoint(',')
                 ->filename($client->name)
                 ->addItems($items)
                 ->logo(public_path('vendor/invoices/sample1-logo.png'))
                 // You can additionally save generated invoice to configured disk
                 ->save('public');
     
             $link = $invoice->url('C:\laragon\www\api\public\storage');
             // Then send email to party with link
     
             // And return invoice itself to browser or have a different view
             return $invoice->stream();
     }

     
     else {
        //abort(404, 'Not Found');
        return response([
            'message' =>'The chosen invoice does not exist'
        ],404 );
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBillRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillRequest $request, $id)
    {
        
        try {
            
            $bill = Bill::find($id);
            $validateData = $request->validated();
             $bill->update($validateData);
            return response()->json([
                'status' => true,
                'message' => 'Bill Updated Successfuly',
                'bill' => $bill,
            ], 200);

        } 
        catch (Throwable $th) {

            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
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
            $bill = Bill::destroy($id);
            return response()->json([
                'status' => true,
                'message' => 'Bill Deleted Successfuly',
                'bill' => $bill,
            ], 200);
                
        } 
        catch (Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ],500);
        }

    }

        /**
     * Search the payment(just fot test) resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function search($payment)
    {
        $bill = Bill::where('payment','like','%'.$payment.'%')->get();
        return response()->json([
            'status' => true, 
            'message' => 'the results find',
            'bill' => $bill,
        ], 200);
    }
}
