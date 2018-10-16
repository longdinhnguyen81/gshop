<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::pattern('id','([0-9]*)');
Route::pattern('cid','([0-9]*)');
Route::pattern('slug','(.*)');

Route::namespace('Gshop')->group(function(){
	Route::get('/', [
		'uses' => 'IndexController@index',
		'as' => 'gshop.index.index'
	]);
	Route::post('/search', [
		'uses' => 'IndexController@postSearch',
		'as' => 'gshop.index.search'
	]);
	Route::get('/produce/{slug}-{cid}', [
		'uses' => 'ProduceController@index',
		'as' => 'gshop.produce.index'
	]);
	Route::get('/{slug}-{id}.html', [
		'uses' => 'ProduceController@detail',
		'as' => 'gshop.produce.detail'
	]);
	Route::get('/cart', [
		'uses' => 'CarController@cart',
		'as' => 'gshop.payment.cart'
	]);
	Route::get('/payment', [
		'uses' => 'CarController@payment',
		'as' => 'gshop.payment.payment'
	]);
});
Route::namespace('Ajax')->group(function(){
	Route::get('/pActive', [
		'uses' => 'ProduceController@active',
		'as' => 'ajax.produce.active'
	]);
	Route::get('/getValue', [
		'uses' => 'ProduceController@getValue',
		'as' => 'ajax.produce.getvalue'
	]);
});

Route::namespace('Admin')->group(function(){
// Index ADMIN	
	Route::prefix('admin')->group(function(){
		Route::get('', [
			'uses' => 'IndexController@index',
			'as' => 'admin.index.index'
		]);
// travel 
		Route::prefix('cat')->group(function(){
			Route::get('', [
				'uses' => 'CatController@index',
				'as' => 'admin.cat.index'
			]);
			Route::get('add', [
				'uses' => 'CatController@getAdd',
				'as' => 'admin.cat.add'
			]);
			Route::post('add', [
				'uses' => 'CatController@postAdd',
				'as' => 'admin.cat.add'
			]);
			Route::get('edit/{cid}', [
				'uses' => 'CatController@getEdit',
				'as' => 'admin.cat.edit'
			]);
			Route::post('edit/{cid}', [
				'uses' => 'CatController@postEdit',
				'as' => 'admin.cat.edit'
			]);
			Route::get('del/{cid}', [
				'uses' => 'CatController@del',
				'as' => 'admin.cat.del'
			]);
		});
		Route::prefix('produce')->group(function(){
			Route::get('', [
				'uses' => 'ProduceController@index',
				'as' => 'admin.produce.index'
			]);
			Route::get('add', [
				'uses' => 'ProduceController@getAdd',
				'as' => 'admin.produce.add'
			]);
			Route::post('add', [
				'uses' => 'ProduceController@postAdd',
				'as' => 'admin.produce.add'
			]);
			Route::get('edit/{id}', [
				'uses' => 'ProduceController@getEdit',
				'as' => 'admin.produce.edit'
			]);
			Route::post('edit/{id}', [
				'uses' => 'ProduceController@postEdit',
				'as' => 'admin.produce.edit'
			]);
			Route::get('del/{cid}', [
				'uses' => 'ProduceController@del',
				'as' => 'admin.produce.del'
			]);
		});
		Route::prefix('payment')->group(function(){
			Route::get('', [
				'uses' => 'PaymentController@index',
				'as' => 'admin.payment.index'
			]);
			Route::get('del/{id}', [
				'uses' => 'PaymentController@del',
				'as' => 'admin.payment.del'
			]);
		});
		Route::prefix('users')->group(function(){
			Route::get('', [
				'uses' => 'UsersController@index',
				'as' => 'admin.users.index'
			]);
			Route::get('del/{id}', [
				'uses' => 'UsersController@del',
				'as' => 'admin.users.del'
			]);
		});
		Route::prefix('card')->group(function(){
			Route::get('', [
				'uses' => 'CardController@index',
				'as' => 'admin.card.index'
			]);
			Route::get('add', [
				'uses' => 'CardController@getAdd',
				'as' => 'admin.card.add'
			]);
			Route::post('add', [
				'uses' => 'CardController@postAdd',
				'as' => 'admin.card.add'
			]);
			Route::get('edit/{id}', [
				'uses' => 'CardController@getEdit',
				'as' => 'admin.card.edit'
			]);
			Route::post('edit/{id}', [
				'uses' => 'CardController@postEdit',
				'as' => 'admin.card.edit'
			]);
			Route::get('del/{cid}', [
				'uses' => 'CardController@del',
				'as' => 'admin.card.del'
			]);
		});
		Route::prefix('admin')->group(function(){
			Route::get('', [
				'uses' => 'AdminController@index',
				'as' => 'admin.admin.index'
			]);
			Route::get('add', [
				'uses' => 'AdminController@getAdd',
				'as' => 'admin.admin.add'
			]);
			Route::post('add', [
				'uses' => 'AdminController@postAdd',
				'as' => 'admin.admin.add'
			]);
			Route::get('edit/{id}', [
				'uses' => 'AdminController@getEdit',
				'as' => 'admin.admin.edit'
			]);
			Route::post('edit/{id}', [
				'uses' => 'AdminController@postEdit',
				'as' => 'admin.admin.edit'
			]);
			Route::get('del/{cid}', [
				'uses' => 'AdminController@del',
				'as' => 'admin.admin.del'
			]);
		});
		Route::prefix('setcard')->group(function(){
			Route::get('', [
				'uses' => 'SetCardController@index',
				'as' => 'admin.setcard.index'
			]);
			Route::get('del/{id}', [
				'uses' => 'SetCardController@del',
				'as' => 'admin.setcard.del'
			]);
		});
	});
});