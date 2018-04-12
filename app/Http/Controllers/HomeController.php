<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
      protected $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
          $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
         $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemsCount = Items::all()->count();
        $itemsAveragePrice = substr(Items::avg('price'),0,4);
        $percentItemsPrice = Items::selectRaw('DISTINCT COUNT(items.id) as total, types.name as type_name')->leftJoin('types', 'items.types_id', '=', 'types.id')->groupBy('types.name')->get();
        $recentItems = Items::orderBy('id', 'DESC')->limit(5)->get(); 
        $latestItems = Items::orderBy('id', 'DESC')->limit(3)->get(); 

        return view('home', [
                'itemsCount' => $itemsCount,
                'itemsAveragePrice' => $itemsAveragePrice,
                'percentItemsPrice' => $percentItemsPrice,
                'recentItems' => $recentItems,
                'latestItems' => $latestItems,
                'user' => $this->user,
            ]);
    }
}
