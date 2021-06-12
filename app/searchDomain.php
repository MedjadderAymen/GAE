<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class searchDomain extends Model
{
    protected $fillable=[
        "domain"
    ];

    /**
     * @return HasMany
     */
    public function projects()
    {
        return $this->hasMany(project::class);
    }

    public function teachers(){
        return $this->belongsToMany(teacher::class);
    }
}
