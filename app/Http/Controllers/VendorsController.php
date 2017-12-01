<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vendors as VendorsRequest;
use App\Vendors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VendorsController extends Controller
{

    protected $user;
    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

     /**
     * Store a new vendor 
     * @param $request
     * @return void
     */
    public function store(VendorsRequest $request)
    {
        try {
            Vendors::create([
                'name' => $request->name,
                'users_id' => $this->user->id,
            ]);
            return redirect('/vendors');
        } catch (\Exception $e) {

            Session::flash('message', $e->getMessage());
            return redirect('/vendors/create');
        }

    }
    
    /**
     * Update the current vendor 
     * @param $request
     * @return void
     */
    public function update(VendorsRequest $request)
    {
        try {
            $vendor = Vendors::find($request->id);
            $vendor->name = $request->name;
            $vendor->save();
            Session::flash('message', 'The Item was succesfully updated');
            
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
        }
        return redirect('/vendors');
    }

     /**
     * Store a new vendor 
     * @param $id
     * @return array $vendor
     */
    public function edit($id)
    {
        // $item = Vendors::find($id);        
        // if ($this->user->can('eddit', $item)) {

            $vendor = Vendors::find($id);

            return view('vendors.update',compact('vendor'));

        // } else {
        //     return view('404');
        // }
    }
}
