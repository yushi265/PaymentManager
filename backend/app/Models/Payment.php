<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'payer_id', 'price'];

    public function event(): BelongsTo
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function payer(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getPriceYenAttribute()
    {
        return '¥'.number_format($this->price);
    }
}
