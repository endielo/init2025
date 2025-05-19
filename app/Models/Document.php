<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'ref',
        'customer_id',
        'type',
        'status',
        'date',
        'due_date',
        'description',
        'total_amount',
    ];

    public function documentLines()
    {
        return $this->hasMany(DocumentLine::class);
    }
}
