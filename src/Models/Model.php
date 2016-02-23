<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as BaseModel;

abstract class Model extends BaseModel
{
    /**
     * Returns the models created at timestamp in a human readable format.
     *
     * @return null|string
     */
    public function getCreatedAtHumanAttribute()
    {
        if ($this->created_at instanceof Carbon) {
            return $this->created_at->diffForHumans();
        }

        return null;
    }

    /**
     * Returns the models updated at timestamp in a human readable format.
     *
     * @return null|string
     */
    public function getUpdatedAtHumanAttribute()
    {
        if ($this->updated_at instanceof Carbon) {
            return $this->updated_at->diffForHumans();
        }

        return null;
    }
}
