<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class BankType extends Model
{
    use Sortable;
    protected $fillable = ['bank_type', 'description'];

    public $sortable = ['id', 'bank_type'];
}

