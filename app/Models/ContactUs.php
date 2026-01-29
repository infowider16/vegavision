<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $guarded = [];
    public $timestamps = true;
    
}
