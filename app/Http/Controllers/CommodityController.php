<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommodityStoreRequest;
use App\Models\Commodity;
use App\Models\Office;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommodityController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['create','update','destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $commodities = trim($search)
            ? Commodity::search($search)->paginate(10)->get()
            : Commodity::with('office')->paginate(10);

        return view('commodities.index', compact('commodities'))
            ->with('header','Commodities');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $commodity = new Commodity();

        return view('commodities.form', compact('commodity'))
            ->with('offices', Office::select('id AS value','name AS label')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CommodityStoreRequest $request
     * @return Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(CommodityStoreRequest $request)
    {
        Commodity::updateOrCreate([
            'id'        => $request->id,
        ],[
            'name'      => $request->name,
            'office_id' => $request->office_id,
        ]);

        return redirect()->route('commodities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commodity  $commodity
     * @return Response
     */
    public function show(Commodity $commodity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commodity  $commodity
     * @return Application|Factory|View|Response
     */
    public function edit(Commodity $commodity)
    {
        return view('commodities.form')
            ->with('commodity', $commodity)
            ->with('offices', Office::select('id AS value','name AS label')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commodity  $commodity
     * @return Response
     */
    public function update(Request $request, Commodity $commodity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commodity  $commodity
     * @return Response
     */
    public function destroy(Commodity $commodity)
    {
        $commodity->delete();

        session()->flash('message','Successfully deleted commodity.');

        return redirect()->route('commodities.index');
    }
}
