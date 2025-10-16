<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'items';

    // Fillable fields
    protected $fillable = [
        'item_name',
        'location',
        'time',
        'category',
        'brand',
        'size',
        'color',
        'user_id', // optional — if each item belongs to a user
    ];
}
