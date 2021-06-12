<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class defence extends Model
{
    protected $fillable=[
      "date", "teacher_id"
    ];

    /**
     * @return BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo(teacher::class);
    }

    /**
     * @return HasMany
     */
    public function students()
    {
        return $this->hasMany(student::class);
    }

    /**
     * @return HasOne
     */
    public function affectation()
    {
        return $this->hasOne(affectation::class);
    }

}
