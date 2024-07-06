<?php

namespace MobarokLab\SupportTickety\Models;

use App\Models\SupportTicket;
use Illuminate\Database\Eloquent\Model;

class SupportCategory extends Model
{
    protected $fillable = ['name'];

    public function tickets()
    {
        return $this->hasMany(SupportTicket::class, 'ticket_category_id');
    }
}
