<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfficeStoreRequest;
use App\Models\Office;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:edit offices')->only('create','edit','update','store');
        $this->middleware('permission:delete offices')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        $search = trim($request->query('search'));

        if ($search) {
            $offices = Office::search($search)->paginate(10);
            $offices->load('roadmaps.commodity');
        } else {
            $offices = Office::with('roadmaps.commodity')->paginate(10);
        }

        return view('offices.index', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $office = new Office();

        return view('offices.form', compact('office'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OfficeStoreRequest $request)
    {
        $office = Office::updateOrCreate([
            'id'            => $request->id,
        ],[
            'name'          => $request->name,
            'short_name'    => $request->short_name,
        ]);

        return redirect()->route('offices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return Response
     */
    public function edit(Office $office)
    {
        return view('offices.form', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return Response
     */
    public function update(Request $request, Office $office)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return Response
     */
    public function destroy(Office $office)
    {
        $office->delete();

        // TODO: notify user that the entry has been deleted
        return redirect()->route('offices.index');
    }
}
