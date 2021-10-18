<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'event_id',
        'status'
    ];

    protected $pimaryKey = 'id';

    public $incrementing = false;


    public function event(){
        return $this->hasOne(Event::class);
    }
}
