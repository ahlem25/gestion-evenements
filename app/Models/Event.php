<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $table = 'events';

    public $fillable = [
        'name',
        'date',
        'location',
        'description',
        'image',
        'capacity',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'name' => 'string',
        'date' => 'datetime',
        'location' => 'string',
        'description' => 'string',
        'image' => 'string',
        'capacity' => 'integer'
    ];

    public static array $rules = [
        'name' => 'required',
        'date' => 'required',
        'location' => 'required',
        'description' => 'required',
        'image' => 'nullable|image',
        'capacity' => 'required|integer|min:1'
    ];

    
}
