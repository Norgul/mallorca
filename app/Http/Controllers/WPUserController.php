<?php

namespace App\Http\Controllers;

use App\WPUser;
use Illuminate\Http\Request;

use App\Http\Requests;

class WPUserController extends Controller
{
    /**
     * Show all instances of WPUser objects
     *
     * @return \Illuminate\Contracts\View\\Illuminate\Contracts\View\Factory|\Illuminate\View\\Illuminate\View\View
     */
    public function index()
    {
        $wpusers = WPUser::orderBy('date_time', 'desc')->get();
        $page_title = 'Complete user list';
        $page_description = 'click for specific details';
        return view('users.index', compact('wpusers', 'page_title', 'page_description'));
    }

    /**
     * Show one instance of WPUser object
     *
     * @param $id
     * @return \Illuminate\Contracts\View\ \Illuminate\Contracts\View\Factory|\Illuminate\View\\Illuminate\View\View
     * @internal param WPUser $wpuser
     */
    public function show($id)
    {
        $wpuser = WPUser::find($id);
        $page_title = 'User: ' . $wpuser->first_name . " " . $wpuser->last_name;
        return view('users.show', compact('wpuser', 'page_title'));
    }

    /**
     * Create a new WPUser object
     *
     * @return \Illuminate\Contracts\View\\Illuminate\Contracts\View\Factory|\Illuminate\View\\Illuminate\View\View
     */
    public function create()
    {
        return view('wpuser.create');
    }

    /**
     * Edit WPUser object
     *
     * @param WPUser $wpuser
     * @return \Illuminate\Contracts\View\\Illuminate\Contracts\View\Factory|\Illuminate\View\\Illuminate\View\View
     */
    public function edit(WPUser $wpuser)
    {
        return view('wpuser.edit', compact('wpuser'));
    }

    /**
     * Save WPUser object instance (POST request)
     *
     * @return \Illuminate\Http\\Illuminate\Http\RedirectResponse|\Illuminate\Routing\\Illuminate\Routing\Redirector
     */
    public function store()
    {
        return redirect('home');
    }

    /**
     * Update WPUser object instance (PUT request)
     *
     * @param WPUser $wpuser
     * @return \Illuminate\Http\\Illuminate\Http\RedirectResponse|\Illuminate\Routing\\Illuminate\Routing\Redirector
     */
    public function update(WPUser $wpuser)
    {
        return redirect('home');
    }

    /**
     * Delete WPUser object (DELETE request)
     *
     * @param WPUser $wpuser
     * @return \Illuminate\Http\\Illuminate\Http\RedirectResponse|\Illuminate\Routing\\Illuminate\Routing\Redirector
     */
    public function destroy(WPUser $wpuser)
    {
        return redirect('home');
    }
}
