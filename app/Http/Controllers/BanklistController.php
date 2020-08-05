<?php

namespace App\Http\Controllers;

use App\BankType;
use Illuminate\Http\Request;

class BanklistController extends Controller
{
    public function btList() {

        $btList = BankType::select('id', 'bank_type')->get();

        return view('/bankregistry.index', compact($btList));
    }
}
