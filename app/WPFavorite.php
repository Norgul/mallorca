<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class WPFavorite extends Model
{
    protected $table = 'tbl_fav';
/*
    public function getDateTimeAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d.m.Y.');
    }
*/
    public function user()
    {
        return $this->hasOne('App\WPUser', 'id', 'user_id');
    }

    public function recipe()
    {
        return $this->hasOne('App\WPRecipe', 'ID', 'recipe_id');
    }
}
