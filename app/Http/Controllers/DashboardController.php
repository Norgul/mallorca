<?php

namespace App\Http\Controllers;

use App\WPComment;
use App\WPFavorite;
use App\WPUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    public function index()
    {
        $users = array_slice(WPUser::orderBy('id', 'desc')->get()->toArray(), 0, 20);

        // count = 80
        $comments = WPComment::with('recipe')->orderBy('comment_date', 'desc')->get()->toArray();
        foreach ($comments as &$comment) {
            $comment['date_time'] = $comment['comment_date'];
        }
        // count = 241
        $favorites = WPFavorite::with('user', 'recipe')->orderBy('date_time', 'desc')->get()->toArray();

        $mergedArray = array_merge_recursive($comments, $favorites);

        $mergedArray = collect($mergedArray);
        $mergedArray = $mergedArray->sortByDesc('date_time');
        $mergedArray = $mergedArray->groupBy(function($item)
        {
            return Carbon::createFromFormat('Y-m-d H:i:s', $item['date_time'])->format('d.m.Y.');
        });

        $mergedArray = $mergedArray->toArray();
        $mergedArray = array_slice($mergedArray, 0,10);

        return view('dashboard.index', compact('users', 'mergedArray'));
    }
}
