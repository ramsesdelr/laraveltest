<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vendors as VendorsRequest;
use App\Repositories\VendorsRepository;
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
    public function store(VendorsRequest $request, VendorsRepository $vendorsRepo)
    {
        try {
            $path = null;
            $records = $request->all();

            $path = $vendorsRepo->uploadImage($request);

            $records = array_merge($request->all(), ['users_id' => $this->user->id, 'logo' => $path]);
            $vendorsRepo->create([
                'name' => $records['name'],
                'users_id' => $this->user->id,
                'logo' => $records['logo'],
            ]);
            return redirect('/vendors');
        } catch (\Exception $e) {
            die($e->getMessage());
            Session::flash('message', $e->getMessage());
            return redirect('/vendors/create');
        }

    }

    /**
     * Update the current vendor
     * @param $request
     * @return void
     */
    public function update(VendorsRequest $request, VendorsRepository $vendorsRepo)
    {
        try {
            $records = $request->all();
            if ($request->hasFile('logo')) {
                $path = null;
                $path = $vendorsRepo->uploadImage($request);
                $records = array_merge($request->all(), ['logo' => $path]);
            }
            $vendorsRepo->update($request->id, $records);
            Session::flash('message', 'The Item was succesfully updated');
            return redirect('/vendors');

        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            return redirect('/vendors/' . $request->id . '/edit');

        }
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

        return view('vendors.update', compact('vendor'));

        // } else {
        //     return view('404');
        // }
    }
}
