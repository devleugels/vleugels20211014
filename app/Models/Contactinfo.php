<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactinfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'banknaam', 'iban', 'bic',  'afzendernaam', 'straat',
        'huisnummer','postcode', 'gemeente', 'telefoon', 'email_id'
      ]; 
      
      public function email()
      {
          return $this->belongsTo(Emailadressen::class);
      }     
}
