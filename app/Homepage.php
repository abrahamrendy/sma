<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'home_contents';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
