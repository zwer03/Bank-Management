<?php

namespace App\Http\Controllers;

use App\BankRegistry;
use Illuminate\Http\Request;
use App\BankType;

class BankRegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = \DB::table('bank_registries')->paginate(15);

        return view('bankregistry.index',compact('banks'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $banktype = \App\BankType::pluck('bank_type', 'id');
        $selectedid = 1;

        


        return view('bankregistry.create', compact('selectedid','banktype'));  
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
            'bank_name'=>['required', 'max:30', 'min:1'],
            'bank_type_id'=>'required',
            'branch'=>['required', 'max:30','min:1'],
            'address'=>['required', 'max:50','min:1'],
            'remarks'=> ['max:200']


        ]);

        $bankregistry = BankRegistry::create(request(['bank_name', 'bank_type_id', 'branch', 'address', 'remarks']));

        return redirect()->back()->with('message', 'Bank Registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BankRegistry  $bankRegistry
     * @return \Illuminate\Http\Response
     */
    public function show(BankRegistry $bankRegistry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BankRegistry  $bankRegistry
     * @return \Illuminate\Http\Response
     */
    public function edit(BankRegistry $bankRegistry)
    {
        return view('bankregistry/index/edit', compact('bankRegistry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BankRegistry  $bankRegistry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankRegistry $bankRegistry)
    {
        $request->validate([
            'bank_name'=>['required', 'max:30', 'min:1'],
            'bank_type_id'=>'required',
            'branch'=>['required', 'max:30','min:1'],
            'address'=>['required', 'max:50','min:1'],
            'remarks'=> ['max:200','min:1']
        ]);

        $bank->update($request->all());

        return redirect()->route('bankregistry/index')
            -with('success','Bank updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BankRegistry  $bankRegistry
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankRegistry $bankRegistry)
    {
        //
    }
}
