<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'books';
    protected $fillable = [
        'name',
        'phone',
        'from_date',
        'to_date',
        'qty',
        'total',
        'payment_slip',
        'room_id',
        'payment_id'
    ];

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
