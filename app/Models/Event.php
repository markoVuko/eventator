<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name'
    ];

    protected $table = 'events';

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
