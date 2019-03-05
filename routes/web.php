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

Route::get('/', function () {
    return 'welcome';
});


Route::get('Voluntary','FormsController@indexVoluntary')->name('indexVoluntary');
Route::get('VoluntaryAds','FormsController@indexVoluntaryAds')->name('indexVoluntaryAds');
Route::get('Talent','FormsController@indexTalent')->name('indexTalent');
Route::get('TalentAds','FormsController@indexTalentAds')->name('indexTalentAds');
Route::get('Entrepreneurship','FormsController@indexEntrepreneurship')->name('indexEntrepreneurship');
Route::get('EntrepreneurshipAds','FormsController@indexEntrepreneurshipAds')->name('indexEntrepreneurshipAds');
Route::post('storeValidate','FormsController@storeValidate')->name('storeValidate');
Route::post('store','FormsController@store')->name('store');
