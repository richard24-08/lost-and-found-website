<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name', 'reporter_name', 'finder_name','location', 'last_seen','time_lost', 'time_found',
        'description', 'category', 'brand', 'size', 'color',
        'image_path', 'report_type',
    ];
}
