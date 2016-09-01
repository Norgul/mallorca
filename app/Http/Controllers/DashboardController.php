<?php

namespace App\Http\Controllers;

use App\WPComment;
use App\WPFavorite;
use App\WPUser;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    public function index()
    {
        $users = array_slice(WPUser::orderBy('id', 'desc')->get()->toArray(), 0, 20);
        $comments = array_slice(WPComment::with('recipe')->orderBy('comment_date',
            'desc')->get()->groupBy('comment_date')->toArray(), 0, 5);
        $favorites = array_slice(WPFavorite::with('user', 'recipe')->orderBy('date_time',
            'desc')->get()->groupBy('date_time')->toArray(), 0, 5);

        $mergedArray = array_slice(array_merge_recursive($comments, $favorites), 0, 5);

        return view('dashboard.index', compact('users', 'mergedArray'));
    }
}
