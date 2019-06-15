<?php

namespace App\Http\Controllers;

use App\Book;
use App\History;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this_user = Auth::user();
        $users = User::all();
        $c_rented_books = Book::all();
        $rent_history = History::all();

        return view('home',compact('this_user','users','c_rented_books','rent_history'));
    }
}
