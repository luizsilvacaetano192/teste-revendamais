<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Address extends Model
{
    use Searchable;
    use HasFactory;

    protected $guarded = [];

    protected function zipCode(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $this->attributes['zip_code'] = preg_replace('/[^0-9]/', '', $value),
            get: fn ($value) => substr_replace($value, '-', 5, 0)
        );
    }

    public static function findByZipCode(string $zipCode)
    {
        return self::where('zip_code', $zipCode)->first();
    }

    public function toSearchableArray()
    {
        return [
            'street' => $this->street,
            'neighborhood' => $this->neighborhood,
            'city' => $this->city,
            'state' => $this->state
        ];
    }
}
