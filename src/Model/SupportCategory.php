<?php

namespace MobarokLab\SupportTickety\Models;

use Illuminate\Database\Eloquent\Model;
use MobarokLab\SupportTickety\Models\SupportTicket;

class SupportCategory extends Model
{
    protected $fillable = ['name'];

    public function tickets()
    {
        return $this->hasMany(SupportTicket::class, 'ticket_category_id');
    }
}
