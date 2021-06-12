<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class teacher extends Model
{
    protected $fillable = [
        "user_id","department_id","grade","affectation_id"
    ];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(department::class);
    }

    /**
     * @return BelongsTo
     */
    public function affectation()
    {
        return $this->belongsTo(affectation::class);
    }


    public function searchDomains(){
        return $this->belongsToMany(searchDomain::class);
    }

    /**
     * @return HasOne
     */
    public function defence()
    {
        return $this->hasOne(defence::class);
    }
}
