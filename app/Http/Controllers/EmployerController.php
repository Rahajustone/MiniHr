<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;
use App\Models\Employer;
use App\Models\Position;
use Alert;


class EmployerController extends Controller
{
    public $departments;
    public $positions;
    public $employee;

    public function __construct()
    {
        $this->middleware('auth');
        $this->departments = new Departments;
        $this->positions = new Position;
        $this->employees = new Employer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index', [
            'employees'=> $this->employees->with('department', 'positions')->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create', [
            'departments' => $this->departments->all(),
            'positions' => $this->positions->all(),
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
        $this->validate($request , [
            'name'      => 'required',
            'surname'   => 'required',
            'birthday'  => 'required',
            'salary'    => 'required',
            'status'    => 'required'
        ]);

        $employee = $this->employees->create($request->all());

        $result = $employee->positions()->attach($request->positions);

        Alert::success('Employee added successfully.', '');
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('employee.show', [
            'employee'=> $this->employees->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('employee.edit',[
            'departments' => $this->departments->all(),
            'positions' => $this->positions->all(),
            'employee' => $this->employees->findOrFail($id)
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
        $this->validate($request , [
            'name'      => 'required',
            'surname'   => 'required',
            'birthday'  => 'required',
            'salary'    => 'required',
            'status'    => 'required'
        ]);

        $employee = $this->employees->findOrFail($id);
        $employee->update($request->all());

        $result = $employee->positions()->sync($request->positions);

        Alert::success('Employee updated successfully.', '');
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->employees->findOrFail($id);

        if ($result->delete()) {
            $result->positions()->detach();

            Alert::success('Employee deleted successfully.', '');
            return redirect()->route('employee.index');
        }

        Alert::warning('Something goes wrong..', 'Please try one more.');
        return redirect()->back();
    }
}
