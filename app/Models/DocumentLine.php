<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_id',
        'product_id',
        'product',
        'unit_price',
        'unit',
        'quantity',
        'total_amount',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}