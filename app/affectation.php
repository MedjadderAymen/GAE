<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class affectation extends Model
{
    protected $fillable=[

    ];

    /**
     * @return HasMany
     */
    public function teachers()
    {
        return $this->hasMany(teacher::class);
    }

    /**
     * @return BelongsTo
     */
    public function defence()
    {
        return $this->belongsTo(defence::class);
    }
}
