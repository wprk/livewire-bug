<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Campaign extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'custom_fields' => 'json',
    ];

    protected $dates = [
        'start_date',
    ];

    protected $dateFormat = Carbon::RFC3339_EXTENDED;

    protected $fillable = [
        'start_date',
    ];

    public function getStartDateForHumansAttribute(): ?string
    {
        $date = $this->getAttribute('start_date');

        if (is_null($date)) {
            return null;
        }

        if (!$date instanceof Carbon) {
            $date = Carbon::createFromFormat($this->dateFormat, $date);
        }

        return $date->format('jS M Y h:iA');
    }

    public function setStartDateForHumansAttribute($value): void
    {
        $this->setAttribute('start_date', $value);
    }
}
