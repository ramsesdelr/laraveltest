<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Vendors as VendorsRequest;
use App\Types;
use App\Repositories\ItemsPropertiesRepository;
use App\Repositories\TypesRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class TypesController extends Controller
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
     * Store a new tpye 
     * @param $request
     * @return void
     */
    public function store(VendorsRequest $request, TypesRepository $typesRepo)
    {
        try {
            $typesRepo->create([
                'name' => $request->name,
                'users_id' => $this->user->id,
            ]);
            return redirect('/types');
        } catch (\Exception $e) {

            Session::flash('message', $e->getMessage());
            return redirect('/types/create');
        }

    }
    
    /**
     * Update the current type 
     * @param $request
     * @return void
     */
    public function update(VendorsRequest $request, TypesRepository $typesRepo)
    {
        try {
            $typesRepo->update($request->id, $request);
            Session::flash('message', 'The Item was succesfully updated');
            
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
        }
        return redirect('/types');
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

            $type = types::find($id);

            return view('types.update',compact('type'));

        // } else {
        //     return view('404');
        // }
    }
}
