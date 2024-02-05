<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'event_date', 'event_time', 'event_length', 'event_status', 'created_by'];

    public function creator_inf(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
