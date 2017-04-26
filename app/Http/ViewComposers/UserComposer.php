<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\User;

class UserComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view of view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('users', User::orderBy('id', 'DESC')->paginate());
    }
}
