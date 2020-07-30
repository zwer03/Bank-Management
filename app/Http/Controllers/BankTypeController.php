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
        $bankTypes = BankType::where('isInactive',0)->get();
  
        return view('banktype.index',compact('bankTypes'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
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
            'bank_type'=>['required', 'max:20', 'min:7', 'not_regex:/^[a-zA-Z0-9]{4,10}$/'],
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function edit(BankType $bankType)
    {
        return view('banktype.edit', compact('bankType')); ;
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

        $request->validate([

            'bank_type'=>['required', 'max:20', 'min:7', 'regex:/[a-zA-Z0-9]{4,10}$/'],
            'description'=>['max:200', 'nullable'],
            
        ]);

        $bankType->update($request->all());

        return redirect()->route('bank_types.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BankType  $bankType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankType $bankType, Request $request)
    {
        $bankType->isInactive=1;

        $bankType->save();
         // $bankRegistry->delete();
 
         return redirect()->route('bank_types.index')
                         ->with('success','Bank Type deleted successfully');
    }

    
}
