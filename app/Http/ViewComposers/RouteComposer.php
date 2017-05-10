<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Route;

class RouteComposer
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
        $view->with('routes', Route::all());
    }
}
