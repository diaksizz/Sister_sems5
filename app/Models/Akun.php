<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;
    protected $table = 'akun';

    public function punyahero()
    {
        return $this->hasMany(Punyahero::class);
    }

    public function punyaskin()
    {
        return $this->hasMany(Punyaskin::class);
    }
}
