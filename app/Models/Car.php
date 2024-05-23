<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    protected $fillable = [
        'name',
        'registration_number',
        'is_registered'
    ];
    protected static array $carValidation = [
        'name' => 'required',
        'registration_number' => 'required_if:is_registered,true|nullable|unique:cars,registration_number',
        'is_registered' => 'required|boolean',
    ];

    public static function getCarValidation($carId = null): array
    {
        $rules = self::$carValidation;
        if ($carId) {
            $rules['registration_number'] = 'required_if:is_registered,true|nullable|unique:cars,registration_number,' . $carId;
        }
        return $rules;
    }
    use HasFactory;

    public function parts(): HasMany
    {
        return $this->hasMany(Part::class);
    }

}
