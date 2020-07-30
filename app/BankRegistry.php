<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankRegistry extends Model
{
    protected $fillable = ['bank_name', 'bank_type_id' , 'branch', 'address', 'remarks'];


    public function banktype(){
        return $this->belongsTo('App\BankType');
    }
}