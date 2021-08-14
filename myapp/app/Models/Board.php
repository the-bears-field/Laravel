<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Board extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public static $rules = [
        'person_id' => 'required',
        'title' => 'required',
        'message' => 'required'
    ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    public function getData()
    {
        return $this->id. ': '. $this->title. ' ('. $this->person->name. ')';
    }
}
