<?php

namespace App\Http\Controllers;

use App\Items;
use App\Types;
use App\User;
use App\Vendors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ItemsController extends Controller
{
    protected $user;
    public $vendors, $types;
    /**
     * Create a new controller instance.Cun
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            //let's get all vendors and types
            $this->vendors = Vendors::all();
            $this->types = Types::all();

            return $next($request);
        });
    }

    /**
     * Create a new Item
     * @return void
     */

    public function create()
    {

        return view('items.form', ['vendors' => $this->vendors, 'types' => $this->types]);
    }

    /**
     * Store a new Item into the database
     *
     * @param Request $request
     *
     * @return void
     */
    public function store()
    {
        //let's validate first the form
        $this->validate(request(), [
            'name' => 'required',
            'vendors_id' => 'required',
            'types_id' => 'required',
            'sku' => 'required',
            'release_date' => 'required',
        ]);

        //we proceed to create the record
        Items::create([
            'name' => request('name'),
            'vendors_id' => request('vendors_id'),
            'types_id' => request('types_id'),
            'sku' => request('sku'),
            'release_date' => request('release_date'),
            'price' => request('price'),
            'weight' => request('weight'),
            'color' => request('color'),
            'users_id' => $this->user->id,
        ]);

        return redirect('/items');
    }

    /**
     * Get a specific Item by ID
     * @param GET $id
     *
     * @return array
     *
     */
    public function edit($id)
    {
        $item = Items::find($id);

        if ($this->user->can('edit', $item)) {
            $item = Items::find($id);
            return view('items.update',
                ['item' => $item,
                    'vendors' => $this->vendors,
                    'types' => $this->types]
            );
        } else {
            return view('404');
        }
    }

    /**
     * Update record
     * @param POST $id
     *
     * @return array
     *
     */

    public function update()
    {
        $this->validate(request(), [
            'name' => 'required',
            'vendors_id' => 'required',
            'types_id' => 'required',
            'sku' => 'required',
            'release_date' => 'required',
        ]);

        $id = request('id');

        $item = Items::find($id);
        $item->name = request('name');
        $item->vendors_id = request('vendors_id');
        $item->types_id = request('types_id');
        $item->sku = request('sku');
        $item->price = request('price');
        $item->weight = request('weight');
        $item->color = request('color');
        $item->release_Date = request('release_date');
        $item->save();

        Session::flash('message', 'Item succesfully updated!');

        return redirect('/items');

    }

}
