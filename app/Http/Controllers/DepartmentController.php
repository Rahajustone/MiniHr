<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;
use Alert;

class DepartmentController extends Controller
{
    public $departments;

    public function __construct()
    {
        $this->middleware('auth');
        $this->departments = new Departments;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('department.index', [
            'departments' => $this->departments->with('employees')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:departments',
            'description' => 'required'
        ]);

        $result = $this->departments::create($request->all());

        if (!$result) {
            Alert::warning('Something goes wrong', 'Please try one more.');
            return redirect()->back();
        }

        Alert::success('Department added successfully.', '');
        return redirect()->route('department.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('department.edit',[
            'department' => $this->departments->findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $department = $this->departments->findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $department->update($request->all());

        Alert::success('Department updated successfully.', '');
        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->departments->findOrFail($id);

        if ($result->delete()) {

            Alert::success('Department deleted successfully.', '');
            return redirect()->route('department.index');
        }

        Alert::warning('Something goes wrong..', 'Please try one more.');
        return redirect()->back();
    }
}
