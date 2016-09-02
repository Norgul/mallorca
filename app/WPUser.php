<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class WPUser extends Model
{
    protected $table = 'tbl_users';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'date_time'
    ];

    public function scopes()
    {
        return $this->hasMany('App\WPScope', 'user_id', 'id');
    }

    public function restricted_ingredients()
    {
        return $this->hasMany('App\WPRestricted', 'user_id', 'id');
    }

    public function favorites()
    {
        return $this->hasMany('App\WPFavorite', 'user_id', 'id');
    }

    public function getDateTimeAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d.m.y. H:i:s');
    }

}
