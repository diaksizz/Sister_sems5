<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;
    protected $table = 'hero';
    protected $fillable = ['HERONAMA','HEROHARGA'];

    public function punyaheroes()
    {
        return $this->hasMany(Punyahero::class);
    }

}
