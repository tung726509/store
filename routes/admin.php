<?php

Auth::routes();

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::prefix('category')->name('category.')->group(function(){
	Route::get('/', 'CategoryController@index')->name('index');//->where('show', 'trashed')->name('index');
	Route::get('{id}', 'CategoryController@detail')->where('id', '[0-9]+')->name('detail');

	Route::get('add', 'CategoryController@getAdd')->name('add');
	Route::post('add', 'CategoryController@add');

	Route::get('{id}/edit', 'CategoryController@getEdit')->name('edit');	
	Route::post('{id}/edit', 'CategoryController@edit');
});

Route::prefix('product')->name('product.')->group(function(){
	Route::get('/', 'ProductController@index')->name('index');
	Route::get('{id}', 'ProductController@detail')->where('id', '[0-9]+')->name('detail');

	Route::get('add','ProductController@getAdd')->name('add');
	Route::post('add','ProductController@add');

	Route::get('{id}/edit','ProductController@getEdit')->where('id', '[0-9]+')->name('edit');
	Route::post('{id}/edit','ProductController@edit')->where('id', '[0-9]+');
	
	Route::post('/pick-star-ajax', 'ProductController@pickStarAjax')->name('pick_star_ajax');
	Route::post('/delete-image-ajax', 'ProductController@deleteImageAjax')->name('delete_image_ajax');
	Route::post('/upload-image-ajax', 'ProductController@uploadImageAjax')->name('upload_image_ajax');
});

Route::prefix('product_image')->name('product_image.')->group(function(){
	Route::post('/uploads-ajax', 'ProducImagetController@uploadsAjax')->name('uploads_ajax');
});

Route::prefix('tag')->name('tag.')->group(function(){
	Route::get('/', 'TagController@index')->name('index');
	Route::get('{id}', 'TagController@detail')->where('id', '[0-9]+')->name('detail');

	Route::get('add', 'TagController@getAdd')->name('add');
	Route::post('add', 'TagController@add');

	Route::get('{id}/edit', 'TagController@getEdit')->name('edit');
	Route::post('{id}/edit', 'TagController@edit');

	Route::post('ajaxreturn', 'TagController@ajaxreturn')->name('ajaxreturn');
	
});

Route::prefix('warehouse')->name('warehouse.')->group(function(){
	Route::get('/', 'WarehouseController@index')->name('index');
	Route::get('{id}', 'WarehouseController@detail')->where('id', '[0-9]+')->name('detail');

	Route::get('add', 'WarehouseController@getAdd')->name('add');
	Route::post('add', 'WarehouseController@add');

	Route::get('/{id}/edit', 'WarehouseController@getEdit')->name('edit');
	Route::post('/{id}/edit', 'WarehouseController@edit');
});

Route::prefix('warehouse_item')->name('warehouse_item.')->group(function(){

	Route::get('/add/{id}', 'WarehouseItemController@getAdd')->name('add');
	Route::post('/add/{id}', 'WarehouseItemController@add');

	// Route::get('{id}/edit', 'WarehouseItemController@getEdit')->name('edit');
	// Route::post('{id}/edit', 'WarehouseItemController@edit');
	 
	Route::post('edit-warehouse-item', 'WarehouseItemController@editAjax')->name('edit_warehouse_item');
});

Route::prefix('customer')->name('customer.')->group(function(){
	Route::get('/', 'CustomerController@index')->name('index');

	Route::get('detail/{id}', 'CustomerController@detail')->name('detail');

	Route::get('add', 'CustomerController@getAdd')->name('add');
	Route::post('add', 'CustomerController@add');

	Route::get('{id}/edit', 'CustomerController@getEdit')->name('edit');
	Route::post('{id}/edit', 'CustomerController@edit');
});

Route::prefix('order')->name('order.')->group(function(){
	Route::get('/', 'OrderController@index')->name('index');
	
	Route::get('detail/{id}', 'OrderController@detail')->name('detail');

	Route::get('add', 'OrderController@getAdd')->name('add');
	Route::post('add', 'OrderController@add');

	Route::get('{id}/edit', 'OrderController@getEdit')->name('edit');
	Route::post('{id}/edit', 'OrderController@edit');
	
	// ajax
	Route::post('check-phone-ajax', 'OrderController@checkPhoneAjax')->name('check_phone_ajax');
	Route::post('product-list-ajax', 'OrderController@productListAjax')->name('product_list_ajax');
	Route::post('check-wh-ord', 'OrderController@checkOrderWhouse')->name('check_wh_ord');
	Route::post('customer-edit', 'OrderController@customerEdit')->name('customer_edit');
	Route::post('order-change-status-ajax', 'OrderController@orderChangeStatusAjax')->name('order_change_status_ajax');
	Route::post('confirm-pay-ajax', 'OrderController@confirmPayAjax')->name('confirm_pay_ajax');
});

Route::prefix('option')->name('option.')->group(function(){
	Route::get('banner', 'OptionController@getBanner')->name('banner');
	Route::post('banner', 'OptionController@banner');

	Route::get('incentive', 'OptionController@getIncentive')->name('incentive');
	Route::post('incentive', 'OptionController@incentive');

	Route::get('about-us', 'OptionController@getAboutUs')->name('aboutus');
	Route::post('about-us', 'OptionController@aboutUs');

	// ajax
	Route::post('bd-fs-save-val-ajax','OptionController@bdfsSaveValAjax')->name('bd_fs_save_val_ajax');
	Route::post('del-banner-ajax','OptionController@delBannerAjax')->name('del_banner_ajax');
});

Route::prefix('user')->name('user.')->group(function(){
	Route::get('/', 'UserController@index')->name('index');
	
	// Route::get('detail/{id}', 'UserController@detail')->name('detail');

	Route::get('add', 'UserController@getAdd')->name('add');
	Route::post('add', 'UserController@add');

	Route::get('{id}/edit', 'UserController@getEdit')->name('edit');
	Route::post('{id}/edit', 'UserController@edit');

	Route::post('lock-n-unlock', 'UserController@lockUnlock')->name('lock_n_unlock');
});

Route::prefix('role')->name('role.')->group(function(){
	Route::get('/', 'RoleController@index')->name('index');
	
	// Route::get('add', 'RoleController@getAdd')->name('add');
	// Route::post('add', 'RoleController@add');
	
	Route::get('{id}/detail', 'RoleController@getDetail')->name('detail');
	Route::post('{id}/detail', 'RoleController@detail');

});

// tiện ích
Route::prefix('utility')->name('utility.')->group(function(){
	Route::get('/convert-to-address-ajax', 'DashboardController@convertToAddressAjax')->name('convert_to_address_ajax');
});
