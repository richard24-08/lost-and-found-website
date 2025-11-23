<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name', 
        'reporter_name', 
        'finder_name',
        'location', 
        'last_seen',
        'time_lost', 
        'time_found',
        'description', 
        'category', 
        'brand', 
        'size', 
        'color',
        'image_path', 
        'report_type',
    ];

    protected $casts = [
        'time_lost' => 'datetime',
        'time_found' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Report type constants
     */
    const TYPE_LOST = 'lost';
    const TYPE_FOUND = 'found';

    /**
     * Get the report type options
     */
    public static function getReportTypeOptions(): array
    {
        return [
            self::TYPE_LOST => 'Kehilangan',
            self::TYPE_FOUND => 'Penemuan',
        ];
    }

    /**
     * Get the reporter (user who reported)
     */
    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reporter_name', 'name');
    }

    /**
     * Get the finder (user who found the item)
     */
    public function finder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'finder_name', 'name');
    }

    /**
     * Scope for lost reports
     */
    public function scopeLost($query)
    {
        return $query->where('report_type', self::TYPE_LOST);
    }

    /**
     * Scope for found reports
     */
    public function scopeFound($query)
    {
        return $query->where('report_type', self::TYPE_FOUND);
    }

    /**
     * Scope for search
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('item_name', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('reporter_name', 'like', "%{$search}%")
              ->orWhere('finder_name', 'like', "%{$search}%")
              ->orWhere('location', 'like', "%{$search}%")
              ->orWhere('category', 'like', "%{$search}%");
        });
    }

    /**
     * Scope for category filter
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope for report type filter
     */
    public function scopeByType($query, $type)
    {
        return $query->where('report_type', $type);
    }

    /**
     * Get image URL
     */
    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            return asset('images/' . $this->image_path);
        }
        return asset('images/default_image.jpg');
    }

    /**
     * Check if report is lost
     */
    public function getIsLostAttribute(): bool
    {
        return $this->report_type === self::TYPE_LOST;
    }

    /**
     * Check if report is found
     */
    public function getIsFoundAttribute(): bool
    {
        return $this->report_type === self::TYPE_FOUND;
    }

    /**
     * Get formatted time
     */
    public function getFormattedTimeLostAttribute()
    {
        return $this->time_lost?->format('d M Y, H:i');
    }

    /**
     * Get formatted time found
     */
    public function getFormattedTimeFoundAttribute()
    {
        return $this->time_found?->format('d M Y, H:i');
    }

    /**
     * Get formatted created at
     */
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d M Y, H:i');
    }
}