<?php
/*****************单位管理*****************/
Route::group(['prefix' => 'department'], function () {
    Route::get('/', 'DepCrudController@getIndex')->name('Crud.Dep.index');
    Route::get('indexJson', 'DepCrudController@indexJson')->name('Crud.Dep.indexJson');
    Route::get('add','DepCrudController@getAdd')->name('Crud.Dep.add');
    Route::post('add','DepCrudController@postAdd')->name('Crud.Dep.add.post');
    Route::get('edit/{id}','DepCrudController@getEdit')->name('Crud.Dep.edit');
    Route::post('edit','DepCrudController@postEdit')->name('Crud.Dep.edit.post');
    Route::post('sort/save', 'DepCrudController@doSaveSortId')->name('Crud.Dep.saveSort');
    Route::post('del/{id}','DepCrudController@del')->name('Crud.Dep.del');
});