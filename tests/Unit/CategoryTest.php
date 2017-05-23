<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use App\Models\Category;
use Carbon\Carbon;

class CategoryTest extends TestCase
{

	// public function setUp()
 //    {
 //        parent::setUp();
	// 	$user = new User(array('username' => 'sylvan.leus'));
 //    	$this->be($user);
	// }
 //    /**
 //     * A basic test example.
 //     *
 //     * @return void
 //     */
 //    public function testIndex()
 //    {
 //        $response = $this->call('GET', route('admin.categories.index'));
 //        $response->assertStatus(200);
 //    }
 //    /**
 //     * [testCreate description]
 //     * @return [type] [description]
 //     */
 //    public function testCreate() 
 //    {
 //        $response = $this->call('GET', route('admin.categories.create'));
 //        $response->assertStatus(200);
 //    }

 //    public function testStore(){
 //    	$dataCategory = [
 //    		'name' => 'category_name',
 //    	];
 //        $this->call('POST', route('admin.categories.store'), $dataCategory);
 //        $this->assertDatabaseHas('categories',[
 //        	'name'=>$dataCategory['name'],
 //        	]);
 //    	$this->call('GET',route('admin.categories.index'));
 //    	// $this->assertSee('Create Category Success');
 //    	$this->assertTitle(' DaNangBus| Dashboard');
 //    	// $this->browse(function ($browser) {
 //     //        $browser->visit('/admin/categories')
 //     //                -> assertSee(trans('messages.category_create_success'));
 //     //    });
 //    }
}
