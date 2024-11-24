<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function card()
    {
        return $this->hasMany(Card::class, 'card_id', 'id');
    }
}
