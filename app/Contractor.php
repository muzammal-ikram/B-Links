<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contractor extends Model
{
    use SoftDeletes;
    protected $dates = ['date', 'comm_dd', 'etd', 'eta'];
}
