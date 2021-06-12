<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class project extends Model
{
    protected $fillable=[
        "student_id","teacher_id","search_domain_id","project"
    ];

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
    public function teacher()
    {
        return $this->hasOne(teacher::class);
    }

    /**
     * @return HasOne
     */
    public function searchDomain()
    {
        return $this->hasOne(searchDomain::class);
    }

}
