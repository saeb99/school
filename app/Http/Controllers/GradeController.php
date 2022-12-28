<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Requests\GradesRequest;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('grades' , compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradesRequest $request)
    {
        $grade = Grade::create([
            'name' => [
                'ar' => $request->name,
                'en' => $request->name_en,
            ],
            'note' => $request->note,
        ]);

        Toastr::success('messages.grade.success_create');
        return redirect()->route('grade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(GradesRequest $request, Grade $grade)
    {
        $grade = Grade::findOrFail($request->id);
        $grade->update([
            $grade->name = ['ar' => $request->name, 'en' => $request->name_en],
            $grade->note = $request->note,
        ]);
        Toastr::success('messages.grade.success_update');
        return redirect()->route('crade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $grade = Grade::findOrFail($request->id)->delete();
        Toastr::success('messages.grade.success_delete');
        return redirect()->route('grade.index');
    }
}
