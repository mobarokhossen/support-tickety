<?php

namespace MobarokLab\SupportTickety\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SupportTicket extends Model
{
    use HasFactory;
    protected $guarded = [];

    const STATUS_OPTIONS = [
        'open' => 'Open',
        'in_progress' => 'In Progress',
        'closed' => 'Closed',
        'resolved' => 'Resolved'
    ];

    const PRIORITY_OPTIONS = [
        1 => 'Low',
        2 => 'Normal',
        3 => 'High'
    ];

    public function category()
    {
        return $this->belongsTo(SupportCategory::class, 'support_category_id');
    }

    public function statusValue($value)
    {
        return self::STATUS_OPTIONS[$value];
    }
    public function priorityValue($value)
    {
        return self::PRIORITY_OPTIONS[$value];
    }

    public function replied(){
        return $this->belongsTo(SupportTicket::class,'replied_id');
    }

    public function getImagePathAttribute()
    {
        if ( $this->image && file_exists(public_path('uploads/support_tickets/' . $this->image)))
            return asset('uploads/support_tickets/' . $this->image);
        else
            return "";
    }


    // Scope for status
    public function scopeStatus($query, $status)
    {
        if (array_key_exists($status, self::STATUS_OPTIONS)) {
            return $query->where('status', $status);
        }

        return $query;
    }

    // Scope for priority
    public function scopePriority($query, $priority)
    {
        if (array_key_exists($priority, self::PRIORITY_OPTIONS)) {
            return $query->where('priority', $priority);
        }

        return $query;
    }
}
