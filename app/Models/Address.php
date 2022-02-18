<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    public $timestamps = false;

    protected $fillable = [
        'coordinate',
        'street',
        'city',
        'state_id'
    ];
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
