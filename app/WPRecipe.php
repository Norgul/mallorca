<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WPRecipe extends Model
{
    protected $table = 'wp_posts';

    public function favorites()
    {
        return $this->hasMany('App\WPFavorite', 'recipe_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\WPComment', 'comment_post_id', 'id');
    }
}
