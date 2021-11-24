<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    use HasFactory;
    protected $dates = [
        'date'
    ];
    protected $guarded = array('id');
    public static $rules = array(
        'set' => 'required',
        'weight' => 'required',
        'rep' => 'required',
    );
}
