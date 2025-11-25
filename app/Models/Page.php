<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    protected $guarded = ['id'];
    
    public function edisi(): BelongsTo
    {
        return $this->belongsTo(Edisi::class, 'edisi_id');
    }
}
