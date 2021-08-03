<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Person extends Model
{
    use HasFactory;

    public function getData(): string
    {
        return $this->id. ': '. $this->name. ' ('. $this->age. ')';
    }

    public function scopeNameEqual(Builder $query, $str)
    {
        return $query->where('name', $str);
    }
}
