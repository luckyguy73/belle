<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * undocumented class variable
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
