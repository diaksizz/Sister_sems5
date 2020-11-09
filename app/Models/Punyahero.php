<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Punyahero extends Model
{
    use HasFactory;
    protected $table = 'punyahero';
    protected $fillable = ['AKUNID', 'HEROID'];

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }
    function hero()
    {
        return $this->belongsTo(Hero::class );
    }

}
