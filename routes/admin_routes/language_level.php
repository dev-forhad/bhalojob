<?php

/* * ******  LanguageLevel Start ********** */
Route::get('list-language-levels', array_merge(['uses' => 'Admin\LanguageLevelController@indexLanguageLevels'], $all_users))->name('list.language.levels');
Route::get('create-language-level', array_merge(['uses' => 'Admin\LanguageLevelController@createLanguageLevel'], $all_users))->name('create.language.level');
Route::post('store-language-level', array_merge(['uses' => 'Admin\LanguageLevelController@storeLanguageLevel'], $all_users))->name('store.language.level');
Route::get('edit-language-level/{id}', array_merge(['uses' => 'Admin\LanguageLevelController@editLanguageLevel'], $all_users))->name('edit.language.level');
Route::put('update-language-level/{id}', array_merge(['uses' => 'Admin\LanguageLevelController@updateLanguageLevel'], $all_users))->name('update.language.level');
Route::delete('delete-language-level', array_merge(['uses' => 'Admin\LanguageLevelController@deleteLanguageLevel'], $all_users))->name('delete.language.level');
Route::get('fetch-language.levels', array_merge(['uses' => 'Admin\LanguageLevelController@fetchLanguageLevelsData'], $all_users))->name('fetch.data.language.levels');
Route::put('make-active-language-level', array_merge(['uses' => 'Admin\LanguageLevelController@makeActiveLanguageLevel'], $all_users))->name('make.active.language.level');
Route::put('make-not-active-language-level', array_merge(['uses' => 'Admin\LanguageLevelController@makeNotActiveLanguageLevel'], $all_users))->name('make.not.active.language.level');
Route::get('sort-language-levels', array_merge(['uses' => 'Admin\LanguageLevelController@sortLanguageLevels'], $all_users))->name('sort.language.levels');
Route::get('language-level-sort-data', array_merge(['uses' => 'Admin\LanguageLevelController@languageLevelSortData'], $all_users))->name('language.level.sort.data');
Route::put('language-level-sort-update', array_merge(['uses' => 'Admin\LanguageLevelController@languageLevelSortUpdate'], $all_users))->name('language.level.sort.update');
/* * ****** End LanguageLevel ********** */



/* * ******  Language type Start ********** */
Route::get('list-language-type', array_merge(['uses' => 'Admin\LanguageTypeController@indexLanguageTypes'], $all_users))->name('list.language.types');
Route::get('fetch-language.types', array_merge(['uses' => 'Admin\LanguageTypeController@fetchLanguageTypesData'], $all_users))->name('fetch.data.language.types');

Route::get('create-language-types', array_merge(['uses' => 'Admin\LanguageTypeController@createLanguageTypes'], $all_users))->name('create.language.types');
Route::post('store-language-types', array_merge(['uses' => 'Admin\LanguageTypeController@storeLanguageTypes'], $all_users))->name('store.language.types');
Route::get('edit-language-types/{id}', array_merge(['uses' => 'Admin\LanguageTypeController@editLanguageTypes'], $all_users))->name('edit.language.types');
Route::put('update-language-types/{id}', array_merge(['uses' => 'Admin\LanguageTypeController@updateLanguageTypes'], $all_users))->name('update.language.types');
Route::delete('delete-language-types', array_merge(['uses' => 'Admin\LanguageTypeController@deleteLanguageTypes'], $all_users))->name('delete.language.types');


/* * ******  Language type end ********** */