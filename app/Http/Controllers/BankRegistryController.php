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
    public function index(Request $request)
    {
        $bank_id = $request->input('bank_id');
        $bank_type = $request->input('bank_type');

        //query for bank type drop down list
        $bankTypeList = BankType::select('id', 'bank_type')->where('isInactive',0)->get();

        //search query
        $query = BankRegistry::where('isInactive','!=', 1 );
        $query->when($bank_id, function($q, $bank_id){
            return $q->where('id', '=', $bank_id);
        });
        $query->when($bank_type,function($q, $bank_type){
            return $q->where('bank_type_id','=', $bank_type);
        });
        $bankRegistries = $query->sortable('id')->paginate(4);


        return view('bankregistry.index',compact('bankRegistries', 'bankTypeList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        session()->forget('bank_name','bank_type_id','branch','address','remarks');
        $banktype = \App\BankType::where('isInactive',0)->pluck('bank_type', 'id');
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

        $oldvalue = $request->session()->all();

        $this->validate(request(),
        [
            'bank_name'=>['required', 'max:30', 'min:1','regex:/[a-zA-Z0-9]{4,10}$/'],
            'bank_type_id'=>'required',
            'branch'=>['required', 'max:30','min:1'],
            'address'=>['required', 'max:50','min:1'],
            'remarks'=> ['max:200']


        ]);

        session([
            'bank_name'=>request('bank_name'),
            'bank_type_id'=>request('bank_type_id'),
            'branch'=>request('branch'),
            'address'=>request('address'),
            'remarks'=>request('remarks')
        ]);

        $value = $request->session()->all();

        if ($value != $oldvalue){
         $bankregistry = BankRegistry::create(request(['bank_name', 'bank_type_id', 'branch', 'address', 'remarks']));
        }

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

        $banktype = \App\BankType::where('isInactive',0)->pluck('bank_type', 'id');
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
            'bank_name'=>['required', 'max:30', 'min:1', 'regex:/[a-zA-Z0-9\s]{4,10}$/'],
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

    public function search(Request $request){

                $biquery = $request->input('bankid');
                $btquery = $request->input('banktype');
                // if($btquery == ' ')
                //     $bankRegistries = BankRegistry::where('isInactive','!=', 1 )->where('id', '=', $biquery)->get();
                // else
                $bankRegistries = BankRegistry::where('isInactive','!=', 1 )->where('id', '=', $biquery)->orWhere('bank_type_id','=', $btquery)->where('isInactive','!=', 1 )->paginate(4);
                $btList = BankType::select('id', 'bank_type');

        return view('bankregistry.index',compact('bankRegistries', 'btList'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function deleteAll(Request $request)
    {


       $ids = $request-> id;


        \DB::table('bank_registries')->whereIn('id', $ids)->update(array('isInactive'=> 1));



        return redirect()->route('bank_registries.index')
                        ->with('success','Bank deleted successfully');
    }

}
