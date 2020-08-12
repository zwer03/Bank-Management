<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class BankRegistry extends Model
{

    use Sortable;

    protected $fillable = ['bank_name', 'bank_type_id' , 'branch', 'address', 'remarks'];

    public $sortable = ['id', 'bank_name', 'bank_type_id', 'branch'];


    public function banktype(){
        return $this->belongsTo('App\BankType', 'bank_type_id');
    }
}
