<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
class Registration extends Model
{
     use SoftDeletes;    use HasFactory;

     public $table = 'registrations';

    public $fillable = [
        'user_id',
        'event_id',
        'registration_date'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'event_id' => 'integer'
    ];

    public static array $rules = [
        'user_id' => 'required',
        'event_id' => 'required',
        'registration_date' => 'required'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
