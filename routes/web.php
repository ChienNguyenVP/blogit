<?php


Route::get('/', 'Blog\BlogController@index');
Route::get('/test', 'Blog\BlogController@index');
Route::get('/contact', 'HomeController@contact')->name('contact');


/**
 * admin auth
 * ** admin/login | admin/logout
 */
Route::get('admin/login', 'Admin\Auth\LoginController@showLoginForm');
Route::post('admin/login', 'Admin\Auth\LoginController@login');
Route::get('admin/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

/**
 * /admin
 */
Route::prefix('admin')->middleware('admin.login')->group(function(){
	Route::get('/', 'Admin\DashboardController@dashboard')->name('admin.dashboard');
	Route::get('dashboard', 'Admin\DashboardController@dashboard');

	/**
	 * admin/recycle-bin
	 */
	Route::prefix('recycle-bin')->group(function(){
		/**
		 * admin/recycle-bin/posts
		 */
		Route::prefix('posts')->group(function(){
			Route::get('/', 'Admin\RecycleBinController@posts')->name('admin.recycleBin.posts');
			Route::get('json/list-post', 'Admin\RecycleBinController@datatablesListPost')->name('admin.recycleBin.posts.json.listPost');
			Route::put('undo', 'Admin\RecycleBinController@undoPost')->name('admin.recycleBin.posts.undoPost');
			Route::delete('delete', 'Admin\RecycleBinController@deleteForeverPost')->name('admin.recycleBin.posts.delete');
		});

		/**
		 * admin/recycle-bin/categories
		 */
		Route::prefix('categories')->group(function(){
			Route::get('/', 'Admin\RecycleBinController@categories')->name('admin.recycleBin.categories');
			Route::get('json/list-category', 'Admin\RecycleBinController@datatablesListCategory')->name('admin.recycleBin.json.listCategory');
			Route::put('undo', 'Admin\RecycleBinController@undoCategory')->name('admin.recycleBin.categories.undoCategory');
			Route::delete('delete', 'Admin\RecycleBinController@deleteForeverCategory')->name('admin.recycleBin.categories.delete');
		});

		/**
		 * admin/recycle-bin/tags
		 */
		Route::prefix('tags')->group(function(){
			Route::get('/', 'Admin\RecycleBinController@tags')->name('admin.recycleBin.tags');
			Route::get('datatables/list-tag', 'Admin\RecycleBinController@datatablesListTag')->name('admin.recycleBin.datatables.listCategory');
			Route::put('undo', 'Admin\RecycleBinController@undoTag')->name('admin.recycleBin.tags.undoTag');
			Route::delete('delete', 'Admin\RecycleBinController@deleteForeverTag')->name('admin.recycleBin.tags.delete');
		});
	});


	/**
	 * admin/posts
	 */
	Route::prefix('posts')->group(function(){
		Route::get('json/list-post', 'Admin\PostController@jsonListPost')
		->name('admin.posts.json.list');
	});
	Route::resource('posts', 'Admin\PostController', ['names' => [
	    'create' 	=> 'admin.posts.create',
	    'store' 	=> 'admin.posts.store',
	    'edit'		=> 'admin.posts.edit',
	    'index'		=> 'admin.posts.index',
	    'destroy'	=> 'admin.posts.destroy',
	    'update'	=> 'admin.posts.update'	
	]]);

	/**
	 * admin/categories
	 */
	Route::prefix('categories')->group(function(){
		Route::get('json/list-category', 'Admin\CategoryController@jsonListCategory')->name('admin.categories.json.list');
		Route::get('{id_category}/json/list-post', 'Admin\CategoryController@jsonListPost')->name('admin.categories.json.posts');
	});
	Route::resource('categories', 'Admin\CategoryController', ['names' => [
		'index'		=> 'admin.categories.index',
		'destroy' 	=> 'admin.categories.destroy',
		'show'		=>	'admin.categories.show',
		'edit'		=> 'admin.categories.edit',
		'update'	=> 'admin.categories.update',
		'create'	=> 'admin.categories.create',
		'store'		=> 'admin.categories.store'
	]]);

	/**
	 * admin/tags/
	 * 
	 */
	Route::prefix('tags')->group(function(){
		Route::get('datatables/list-tag', 'Admin\TagController@datatablesListTag')->name('admin.tags.datatables.list');
		Route::get('json/listTagName.json', 'Admin\TagController@jsonListTagName')->name('admin.tags.json.listTagName');
	});
	Route::resource('tags', 'Admin\TagController', ['names' => [
		'index' 	=> 'admin.tags.index',
		'store'		=> 'admin.tags.store',
		'destroy'	=> 'admin.tags.destroy',
		'edit'		=> 'admin.tags.edit'
	]]);

	/**
	 * admin/users
	 */
	Route::get('users/json/list-user', 'Admin\UserController@jsonListUser')
		->name('admin.users.json.listUser');
	Route::resource('users', 'Admin\UserController', ['names' => [
		'index' => 'admin.users.index',
	]]);
});

/**
 * /blog
 */
Route::group(['prefix' => 'blog'], function(){
	Route::get('/', 'Blog\BlogController@index')->name('blog.index');
	/**
	 * search
	 */
	Route::get('/search', 'Blog\BlogController@showResultSearch')->name('blog.search');
	Route::get('tag/{id}/{slug}', 'Blog\TagController@show')->name('blog.tag.show');


	/**
	 * blog/posts
	 */
	// Route::get('posts', 'Blog\BlogController@posts');
	Route::prefix('post')->group(function(){
		// Route::get('/', 'Blog\PostController@index')->name('blog.post.index');
		Route::get('{slug}', 'Blog\PostController@detail')->middleware('filter.viewpost')->name('blog.post.detail');
	});

	/**
	 * blog/category
	 */
	// Route::get('categories', 'Blog\BlogController@categories');
	Route::prefix('category')->group(function(){
		// Route::get('/', 'Blog\CategoryController@index');
		Route::get('{id}/{slug}', 'Blog\CategoryController@detail')->name('blog.category.detail');
	});
});

/**
 * users
 */
Route::get('users', 'UserController@users');
Route::get('profile', 'UserController@profile')->name('user.profile');
Route::prefix('user')->group(function(){
	Route::get('{id}', 'UserController@profile')->name('user.detail');
});
