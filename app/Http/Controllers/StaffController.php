<?php

namespace App\Http\Controllers;

use App\Helper\Uploader;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffList = Staff::latest()->get();

        return view('dashboards.staff.index', compact('staffList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'photo' => 'required',
            'structural_role' => 'required',
        ]);

        $file = $request->file('photo');
        $filename = Uploader::upload($file, 'img/staff', $request->name);

        Staff::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'photo' => $filename,
            'structural_role' => $request->structural_role,
            'functional_role' => $request->functional_role,
            'formal_educations' => $request->formal_educations,
            'nonformal_educations' => $request->nonformal_educations,
            'experiences' => $request->experiences,
            'publications' => $request->publications,
        ]);

        return redirect()->route('dashboard.staff.index')->with('message', 'Staff created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return view('dashboards.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'structural_role' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = Uploader::upload($file, 'img/staff', $request->name);
            Uploader::deleteWhenExist($staff->photo, 'img/staff');
        }

        $staff->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'photo' => $filename ?? $staff->photo,
            'structural_role' => $request->structural_role,
            'functional_role' => $request->functional_role,
            'formal_educations' => $request->formal_educations,
            'nonformal_educations' => $request->nonformal_educations,
            'experiences' => $request->experiences,
            'publications' => $request->publications,
        ]);

        return redirect()->route('dashboard.staff.index')->with('message', 'Staff successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        Uploader::deleteWhenExist($staff->photo, 'img/staff');

        $staff->delete();

        return redirect()->route('dashboard.staff.index')->with('message', 'Staff successfully deleted');
    }
}
