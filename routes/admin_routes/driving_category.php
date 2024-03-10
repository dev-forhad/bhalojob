<?php
/* * ******  Driving Category Start ********** */
Route::get('list-driving-category', array_merge(['uses' => 'Admin\DrivingCategoryController@indexDrivingCategory'], $all_users))->name('list.driving.category');
Route::get('fetch-driving-categories', array_merge(['uses' => 'Admin\DrivingCategoryController@fetchDrivingCategoryData'], $all_users))->name('fetch.data.driving.category');

Route::get('create-driving-category', array_merge(['uses' => 'Admin\DrivingCategoryController@createDrivingCategory'], $all_users))->name('create.driving.category');
Route::post('store-driving-category', array_merge(['uses' => 'Admin\DrivingCategoryController@storeDrivingCategory'], $all_users))->name('store.driving.category');
Route::get('edit-driving-category/{id}', array_merge(['uses' => 'Admin\DrivingCategoryController@editDrivingCategory'], $all_users))->name('edit.driving.category');
Route::put('update-driving-category/{id}', array_merge(['uses' => 'Admin\DrivingCategoryController@updateDrivingCategory'], $all_users))->name('update.driving.category');
Route::delete('delete-driving-category', array_merge(['uses' => 'Admin\DrivingCategoryController@deleteDrivingCategory'], $all_users))->name('delete.driving.category');


/* * ******  Driving Category end ********** */
?>