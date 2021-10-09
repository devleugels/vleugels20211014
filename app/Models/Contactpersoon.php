<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactpersoon extends Model
{
    use HasFactory;

    protected $fillable = [
        'voornaam', 'familienaam', 'straat','huisnummer','bus',
        'postcode', 'gemeente', 'telefoon', 'gsm', 'email'
      ];   
      
      public function user()
      {
          return $this->belongsTo(User::class);
      }      
}
