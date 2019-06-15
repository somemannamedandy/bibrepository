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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Book;

Auth::routes();
Route::get('/','BookController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/rent/',function(){
    $id = Input::get('book');
    $this_user = Auth::user();
    $now = now();
    Book::where('id',$id)->update(array('rented_id','return_date'),array($this_user->id,$now));

});
Route::post('/search', function(){
   $qry = Input::get('search');
   $filter = Input::get('filter');
   $books = Book::all();
   $user = Auth::user();
   if(!empty($qry)){
       $s_book = Book::where($filter,'LIKE','%'.$qry.'%')->get();
       if(count($s_book)> 0){
           return view('welcome',compact('user'))->with('details',$s_book)->withQuery($qry)->withFilter($filter);

       }else{
           return view('welcome',compact('books','user'))->withMessage('geen boeken gevonden');
       }
   }else{
       return view('welcome',compact('books','user'))->withMessage('geef een zoekterm in aub');
   }

});

