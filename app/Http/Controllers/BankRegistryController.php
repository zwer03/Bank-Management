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

        $bankRegistries = BankRegistry::with('banktype')->where('isInactive',0)->get();



       //dd($bankRegistries);
       // $bankRegistries = BankRegistry::latest()->paginate(5);

        return view('bankregistry.index',compact('bankRegistries'))
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

        $banktype = \App\BankType::pluck('bank_type', 'id');
        $selectedid = 1;


        return view('bankregistry.edit', compact('bankRegistry', 'banktype')); ;
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
            'remarks'=> ['max:200']
        ]);

        $bankRegistry->update($request->all());

        return redirect()->route('bank_registries.index')
                        ->with('success','Product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BankRegistry  $bankRegistry
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankRegistry $bankRegistry, Request $request)
    {
       $bankRegistry->isInactive=1;

       $bankRegistry->save();
        

        // $bankRegistry->delete();

        return redirect()->route('bank_registries.index')
                        ->with('success','Bank deleted successfully');
    }

    
}