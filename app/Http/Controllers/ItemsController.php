<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Items;
use App\Repositories\ItemsRepository;
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
     * Create a new controller instance
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
    public function store(StoreItemRequest $request, ItemsRepository $itemsRepo)
    {

        //we proceed to create the record from the repository
        try {
            $path = null;
            $path = $itemsRepo->uploadImage($request);
            $records = array_merge($request->all(), ['users_id' => $this->user->id, 'photo' => $path]);
            $itemsRepo->create($records);

        } catch (\Exception $e) {
          
            Session::flash('message', $e->getMessage());
        }

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

            return view('items.update', [
                'item' => $item,
                'vendors' => $this->vendors,
                'types' => $this->types,
            ]);

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

    public function update(StoreItemRequest $request, ItemsRepository $itemsRepo)
    {

        try {
            $records = $request->all();
            
            if ($request->hasFile('photo')) {
                $path = null;
                $path = $itemsRepo->uploadImage($request);
                $records = array_merge($request->all(), ['photo' => $path]);
            }
            $itemsRepo->update(request('id'), $records);

            Session::flash('message', 'The Item was succesfully updated');

        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
        }
        return redirect('/items');

    }

}
