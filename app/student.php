<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class student extends Model
{
    protected $fillable=[
        "user_id","department_id","birth_date","serial_number","inscription_number","project_id"
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
    public function project()
    {
        return $this->belongsTo(project::class);
    }

    public function defence()
    {
        return $this->belongsTo(defence::class);
    }
}
