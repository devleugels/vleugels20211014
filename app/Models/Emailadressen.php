<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emailadressen extends Model
{
    use HasFactory;

    protected $fillable = [
        'naam', 'email'  
      ];    
}
