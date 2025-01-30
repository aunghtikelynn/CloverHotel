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
        'booking_no',
        'name',
        'email',
        'phone',
        'adult',
        'child',
        'check_in',
        'check_out',
        'qty',
        'total',
        'payment_slip',
        'room_id',
        'payment_id',
        'message',
        'status'
    ];

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
