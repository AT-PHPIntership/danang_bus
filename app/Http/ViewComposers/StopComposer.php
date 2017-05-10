<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Stop;

class StopComposer
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
        $view->with('stops', Stop::all());
    }
}
