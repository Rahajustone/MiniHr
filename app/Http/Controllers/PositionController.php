<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;
use Alert;

class PositionController extends Controller
{
    public $positions;
    public function __construct()
    {
        $this->middleware('auth');
        $this->positions = new Position;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('position.index', [
            'positions' => $this->positions->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('position.create');
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
            'name' => 'required|unique:positions',
            'description' => 'required'
        ]);

        $result = $this->positions->create($request->all());
        if (!$result) {
            Alert::warning('Something goes wrong', 'Please try one more.');
            return redirect()->back();
        }

        Alert::success('Position added successfully.', '');
        return redirect()->route('position.index');
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
        $position = $this->positions->findOrFail($id);

        return view('position.edit',[
            'position' => $position
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
        $position = $this->positions->findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $position->update($request->all());

        Alert::success('Position updated successfully.', '');
        return redirect()->route('position.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->positions->findOrFail($id);

        if ($result->delete()) {

            Alert::success('Position deleted successfully.', '');
            return redirect()->route('position.index');
        }

        Alert::warning('Something goes wrong..', 'Please try one more.');
        return redirect()->back();
    }
}
