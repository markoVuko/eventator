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

<<<<<<< HEAD
    protected $pimaryKey = 'id';

    public $incrementing = false;

=======
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $table = 'tickets';
>>>>>>> 55acc973016622a36caa83edd35ea17a533e236a

    public function event(){
        return $this->hasOne(Event::class);
    }
}
