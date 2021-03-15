<?php

namespace App\Http\Controllers;

use App\Http\Requests\FocalStoreRequest;
use App\Models\Focal;
use App\Models\FocalType;
use App\Models\Office;
use App\Models\Roadmap;
use Illuminate\Http\Request;

class FocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $focals = Focal::with('roadmaps.commodity')->paginate(10);

        return view('focals.index', compact('focals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $focal = new Focal();

        return view('focals.form', compact('focal'))
            ->with('focal_types', FocalType::select('id AS value','name AS label')->get())
            ->with('offices', Office::select('id AS value','name AS label')->get())
            ->with('roadmaps', Roadmap::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FocalStoreRequest $request)
    {
        $focal = Focal::updateOrCreate([
            'id'    => $request->id,
        ],[
            'focal_type_id' => $request->focal_type_id,
            'office_id' => $request->office_id,
            'name' => $request->name,
            'designation' => $request->designation,
            'email' => $request->email,
            'telephone_number' => $request->telephone_number,
            'fax_number' => $request->fax_number,
            'mobile_number' => $request->mobile_number,
            'viber_number' => $request->viber_number,
        ]);

        $focal->roadmaps()->sync($request->roadmaps);

        return redirect()->route('focals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Focal  $focal
     * @return \Illuminate\Http\Response
     */
    public function show(Focal $focal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Focal  $focal
     * @return \Illuminate\Http\Response
     */
    public function edit(Focal $focal)
    {
        return view('focals.form', compact('focal'))
            ->with('focal_types', FocalType::select('id AS value','name AS label')->get())
            ->with('offices', Office::select('id AS value','name AS label')->get())
//            ->with('roadmaps', Roadmap::join('commodities','commodities.id','=','roadmaps.commodity_id')->select('roadmaps.id AS value','commodities.name AS label')->get());
            ->with('roadmaps', Roadmap::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Focal  $focal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Focal $focal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Focal  $focal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Focal $focal)
    {
        //
    }
}
