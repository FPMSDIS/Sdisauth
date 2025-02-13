<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Auth;


class HomeComposer

{

    /**

     * Bind data to the view.

     *

     * @param  View  $view

     * @return void

     */

    public function compose(View $view)

    {

        View::composer('*', function ($view) {
            if (Auth::check()) {
                $userRoles = Auth::user()->getRoleNames();
                $view->with('userRoles', $userRoles);
            }
        });

    }

}
