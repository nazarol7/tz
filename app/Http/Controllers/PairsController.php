<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pair;

class PairsController extends Controller
{

       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pairs = Pair::orderBy('created_at', 'desc')->paginate(10);
        return view('pairs.index')->with('pairs', $pairs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pairs.create');
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
            'key' => 'required',
            'value' => 'required'
        ]);

        if (Pair::where('key', '=', $request->input('key'))->exists()) {
            return redirect ('/pairs/create')->with('error', 'Record with this key already exists. Try again.');
        }
        // Create pair
        $pair = new Pair;
        $pair->key = $request->input('key');
        $pair->value = $request->input('value');
        $pair->user_id = auth()->user()->id;
        $pair->save();

        return redirect('/pairs')->with('success', 'Pair Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pair = pair::where('id', $id)->first();
        if (is_null($pair)) {
            return redirect('/pairs')->with('error', 'Error. Record does not exist.');  
        }
        
        return view('pairs.show')->with('pair', $pair);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   

        $pair = pair::where('id', $id)->first();
        if (is_null($pair)) {
            return redirect('/pairs')->with('error', 'Error. Record does not exist.');
        }
            
        return view('pairs.edit')->with('pair', $pair);
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
        $this->validate($request, [
            'key' => 'required',
            'value' => 'required'
        ]);
         
        // Create pair
        $pair = Pair::find($id);
        $pair->key = $request->input('key');
        $pair->value = $request->input('value');
        $pair->save();

        return redirect('/pairs')->with('success', 'Pair Updated');
        //return $pair;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $pair = pair::where('id', $id)->first();
        if (is_null($pair)) {
            return redirect('/pairs')->with('error', 'Error. Record does not exist.');
        }

        $pair->delete();
        return redirect('/pairs')->with('success', 'Pair Removed');
        
    }
}
