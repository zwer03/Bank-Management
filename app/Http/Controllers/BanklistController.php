<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BanklistController extends Controller
{
    public function list() {
        $banks = [
            'BPI',
            'BDO',
            'CHINABANK',
        ];

        return view('banklist', [
            'banks' => $banks,
        ]);
    }
}
