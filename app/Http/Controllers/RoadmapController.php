<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoadmapStoreRequest;
use App\Models\Commodity;
use App\Models\Office;
use App\Models\Roadmap;
use Illuminate\Http\Request;

class RoadmapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $roadmaps = trim($search)
            ? Roadmap::search($search)->paginate(10)
            : Roadmap::paginate(10);

        return view('roadmaps.index', compact('roadmaps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roadmap = new Roadmap();

        return view('roadmaps.form', compact('roadmap'))
            ->with([
                'offices'       => Office::select('id AS value','name AS label')->get(),
                'commodities'   => Commodity::select('id AS value','name AS label')->get(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoadmapStoreRequest $request)
    {
        $roadmap = Roadmap::updateOrCreate([
            'id'            => $request->id,
        ],[
            'office_id'     => $request->office_id,
            'commodity_id'  => $request->commodity_id,
            'start_date'    => $request->start_date,
            'user_id'       => $request->user()->id,
        ]);

        return redirect()->route('roadmaps.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roadmap  $roadmap
     * @return \Illuminate\Http\Response
     */
    public function show(Roadmap $roadmap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roadmap  $roadmap
     * @return \Illuminate\Http\Response
     */
    public function edit(Roadmap $roadmap)
    {
        return view('roadmaps.form', compact('roadmap'))
            ->with([
                'offices'       => Office::select('id AS value','name AS label')->get(),
                'commodities'   => Commodity::select('id AS value','name AS label')->get(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roadmap  $roadmap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roadmap $roadmap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roadmap  $roadmap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roadmap $roadmap)
    {
        //
    }
}
