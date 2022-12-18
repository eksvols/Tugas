<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Grades = Grade::latest()->paginate(10);

        return view('mhs.index', compact('Grades'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mhs.create');
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
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'quis' => 'required|integer|lte:100',
            'tugas' => 'required|integer|lte:100',
            'absensi' => 'required|integer|lte:100',
            'praktek' => 'required|integer|lte:100',
            'uas' => 'required|integer|lte:100',
            'grade' => 'required',

        ]);

        Grade::create($request->all());

        return redirect()->route('grade.index')
                        ->with('success', 'Data Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        return view('mhs.show', compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        return view('mhs.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'quis' => 'required|integer|lte:100',
            'tugas' => 'required|integer|lte:100',
            'absensi' => 'required|integer|lte:100',
            'praktek' => 'required|integer|lte:100',
            'uas' => 'required|integer|lte:100',
            'grade' => 'required',

        ]);

        $grade->update($request->all());

        return redirect()->route('grade.index')
                        ->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grade.index')
                        ->with('success','Data deleted successfully');
    }
}
