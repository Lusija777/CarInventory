<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Part extends Model
{
    protected $fillable = [
        'name',
        'serial_number',
        'car_id'
    ];
    protected static array $partValidation = [
        'name' => 'required',
        'serial_number' => 'required|unique:parts,serial_number',
        'car_id' => 'nullable|exists:cars,id',
    ];

    public static function getPartValidation($partId = null): array
    {
        $rules = self::$partValidation;
        if ($partId) {
            $rules['serial_number'] = 'required|unique:parts,serial_number,' . $partId;
        }
        return $rules;
    }
    use HasFactory;

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

}
