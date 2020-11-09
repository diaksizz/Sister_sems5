<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Punyaskin extends Model
{
    use HasFactory;
    protected $table = 'punyaskin';
    protected $fillable = ['AKUNID', 'SKINID'];

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }

    public function hero()
    {
        return $this->belongsTo(Hero::class);
    }
}
