<?php 
/* * ******  Drivingclass Start ********** */
Route::get('list-drivingclass', array_merge(['uses' => 'Admin\DrivingClassController@indexdrivingclass'], $all_users))->name('list.drivingclass');
Route::get('create-drivingclass', array_merge(['uses' => 'Admin\DrivingClassController@createDrivingclass'], $all_users))->name('create.drivingclass');
Route::post('store-drivingclass', array_merge(['uses' => 'Admin\DrivingClassController@storeDrivingclass'], $all_users))->name('store.drivingclass');
Route::get('edit-drivingclass/{id}', array_merge(['uses' => 'Admin\DrivingClassController@editDrivingclass'], $all_users))->name('edit.drivingclass');
Route::put('update-drivingclass/{id}', array_merge(['uses' => 'Admin\DrivingClassController@updateDrivingclass'], $all_users))->name('update.drivingclass');
Route::delete('delete-drivingclass', array_merge(['uses' => 'Admin\DrivingClassController@deleteDrivingclass'], $all_users))->name('delete.drivingclass');
Route::get('fetch-drivingclass', array_merge(['uses' => 'Admin\DrivingClassController@fetchdrivingclassData'], $all_users))->name('fetch.data.drivingclass');
Route::put('make-active-drivingclass', array_merge(['uses' => 'Admin\DrivingClassController@makeActiveDrivingclass'], $all_users))->name('make.active.drivingclass');
Route::put('make-not-active-drivingclass', array_merge(['uses' => 'Admin\DrivingClassController@makeNotActiveDrivingclass'], $all_users))->name('make.not.active.drivingclass');
/* * ****** End Drivingclass ********** */

?>