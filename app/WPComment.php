<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class WPComment extends Model
{
    protected $table = 'wp_comments';
    protected $primaryKey = 'comment_ID';

    public function getCommentDateAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d.m.Y.');
    }

    public function recipe()
    {
        return $this->hasOne('App\WPRecipe', 'ID', 'comment_post_ID');
    }

}
