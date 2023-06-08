<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use Illuminate\Http\Request;

class PlanningController extends Controller
{
    private $breadcrumbs, $routeIndex;

    public function __construct()
    {
        $this->breadcrumbs = [
            'Dashboard' => 'dashboard',
            'Schedule'   => route('schedule.index')
        ];
        $this->routeIndex = 'schedule.index';

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $plannings = Planning::all();
        return view('planing.index', [
            'title' => ucwords('planning'),
            'breadcrumbs' => $this->breadcrumbs,
            'plannings' => $plannings
            // 'formations' => $formations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     
        return view('planing.create', [
            'title' => ucwords('tambah data planning'),
            'breadcrumbs' => $this->breadcrumbs
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'user_id' => ['required', 'max:255'],
            'title' => ['required'],
            'description' => ['required', 'max:255'],
            'category' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'created_by' => ['required'],
            'updated_by' => ['required'],

        ]);

        Planning::create($data);
        

        return redirect()->route('planning.index')->with('toast_success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function show(Planning $planning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function edit(Planning $planning)
    {
        //
        $title = 'Edit Data Planning';
        return view('planing.edit', compact('planning', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planning $planning)
    {
        //
        $validatedData = $request->validate([
            'user_id' => ['required', 'max:255'],
            'title' => ['required'],
            'description' => ['required', 'max:255'],
            'category' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'created_by' => ['required'],
            'updated_by' => ['required'],
        ]);

        $planning->update($validatedData);

        return redirect()->route('planning.index')->with('toast_success', 'Edit Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planning $planning)
    {
        //
        $planning->delete();

        return redirect()->route('planning.index')->with('toast_success', 'Berhasil menghapus data!');
    }
}
