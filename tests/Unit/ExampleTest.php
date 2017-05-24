<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;

class ExampleTest extends TestCase
{
	public function setUp()
    {
        parent::setUp();
		$user = new User(array('username' => 'sylvan.leus'));
    	$this->be($user);
	}
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStore(){
    	$dataCategory = [
     		'name' => 'category_name',
    	];
        $this->call('POST', route('admin.categories.store'), $dataCategory);
        $this->assertDatabaseHas('categories',[
             'name'=>$dataCategory['name'],
                 ]);
        $this->call('GET',route('admin.categories.index'));
        dd( $this->call('GET',route('admin.categories.index')));
        // $this->assertTitle(' DaNangBus| Dashboard');
        // $this->assertSee('aa');

    }
}
