<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skin extends Model
{
    use HasFactory;
    protected $table = 'skin';
    protected $fillable =  ['HEROID', 'SKINNAMA','SKINHARGA'];

    public function punyaskins()
    {
        return $this->hasMany(Punyaskin::class);
    }

}
