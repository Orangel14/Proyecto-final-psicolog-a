<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware(["web", "auth"]);
  }

  public function index()
  {
      {
          if (request()->user()->hasRole('admin')) {
              return view('admin.dashboard');
          }
          
          if (request()->user()->hasRole('user')) {
              return redirect('/home');
          }
      }
  }
}
