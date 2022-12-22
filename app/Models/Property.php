<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    const STATUS_AVAILABLE = 'available';
    const STATUS_RENTED = 'rented';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surface',
        'amount',
        'status'
    ];

    protected $appends = [
        'verbose_surface',
        'verbose_amount'
    ];
}
