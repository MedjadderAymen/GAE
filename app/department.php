<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class department extends Model
{
    protected $fillable=[
      "name"
    ];

    /**
     * @return HasMany
     */
    public function students()
    {
        return $this->hasMany(student::class);
    }

    /**
     * @return HasMany
     */
    public function teachers()
    {
        return $this->hasMany(teacher::class);
    }
}
