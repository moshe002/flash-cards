<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'hint',
        'folder_id'
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
