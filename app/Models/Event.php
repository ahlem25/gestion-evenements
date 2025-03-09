<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
class Event extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'events';

    public $fillable = [
        'name',
        'date',
        'location',
        'description',
        'image',
        'max_capacity'
    ];

    protected $casts = [
        'name' => 'string',
        'date' => 'date',
        'location' => 'string',
        'description' => 'string',
        'image' => 'string',
        'max_capacity' => 'integer'
    ];

    public static array $rules = [
        'name' => 'required|max:255',
        'date' => 'required|date',
        'location' => 'required|max:255',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        'max_capacity' => 'required|integer|min:1'
    ];

    
}
