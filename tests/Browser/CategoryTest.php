<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

class CategoryTest extends DuskTestCase
{
    public function setUp()
    {
        parent::setUp();
        $user = new User(array('username' => 'admin'));
        $this->be($user);
    }
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testIndex()
    {
        // $response = $this->call('GET', route('admin.categories.create'));

        $dataCategory = [
         'name' => 'AAAA',
             ];
        $this->call('POST', route('admin.categories.store'), $dataCategory);
        

        // $response->assertStatus(200);

        // $this->browse(function (Browser $browser) {
        //     $browser->visit('/admin/categories');
        //             // ->assertSee('Laravel');
        // });
    }
}
