<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson;

class Person extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public static $rules = [
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ScopePerson);
    }

    public function getData(): string
    {
        return $this->id. ': '. $this->name. ' ('. $this->age. ')';
    }

    public function scopeNameEqual(Builder $query, $str)
    {
        return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan(Builder $query, $n)
    {
        return $query->where('age', '>=', $n);
    }

    public function scopeAgeLessThan(Builder $query, $n)
    {
        return $query->where('age', '<=', $n);
    }
}
