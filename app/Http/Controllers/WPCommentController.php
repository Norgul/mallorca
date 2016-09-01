<?php

namespace App\Http\Controllers;

use App\WPComment;
use Illuminate\Http\Request;


class WPCommentController extends Controller
{
    public function destroyMe($id)
    {
        WPComment::destroy($id);
        return redirect()->back();
    }
}
