<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    
    protected $fillable = [
        'nama',
        'status',
        'pengguna_id'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class, 'pengguna_id');
    }
}
