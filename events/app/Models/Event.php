<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function speaker(): BelongsTo
    {
        return $this->belongsTo(Speaker::class);
    }
    public function organizer(): BelongsTo
    {
        return $this->belongsTo(Organizer::class);
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
