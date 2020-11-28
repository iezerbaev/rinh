<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientificActivityItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'property_id',
        'value',
        'type',
    ];

    public function getMainProperties() {
        return $this->hasMany(ScientificActivityItem::class, 'id', 'property_id');
    }
}
