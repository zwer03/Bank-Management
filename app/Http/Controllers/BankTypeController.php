<?php

namespace App\Http\Controllers;

use App\BankType;
use Illuminate\Http\Request;

class BankTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       

        return view('banktype.create');
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),
        [
            'bank_type'=>['required', 'max:20', 'min:7', 'regex:/[\w|\d|\s]+/'],
            'description'=>['max:200', 'nullable'],
              
            
            
            

        ]);

        $banktype = BankType::create(request(['bank_type', 'description']));
        

        return redirect()->back()->with('message', 'Bank Type Created');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function show(BankType $bankType)
    {
        $banktypes = DB::table('bank_types')->get();
        

        return view('banktype.show', ['bank_types' => $banktypes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function edit(BankType $bankType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankType $bankType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankType $bankType)
    {
        //
    }
}
