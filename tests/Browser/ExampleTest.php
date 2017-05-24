<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
     use DatabaseMigrations;
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        try{
            $this->browse(function (Browser $browser) {
                $browser->visit('/admin/login')
                        ->assertTitle('Danabus.com ');
            });    
        }catch(\Exception $e){
            dd(request()->url());
        }
        
    }
}
