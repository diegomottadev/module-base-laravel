<?php

namespace App\Http\Controllers\Backend\AdminControllers;

use App\Http\Controllers\Controller;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class PersonController extends Controller
{
    //
    public function index(){
        $persons = Person::paginate(10);
        return view('persons/index',compact('persons'));
    }

    public function new(){
        return view('persons/new');
    }

    public function show($id){
        $person  = Person::findOrFail($id);
        return view('persons/show',compact('person'));
    }

    public function store(Request $request ){

        $burndate = Carbon::createFromFormat('d/m/Y', $request->input('burndate'));
        $person = Person::create([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'nameComplete' =>  $request->get('name')." ".$request->get('surname'),
            'dni' => $request->get('dni'),
            'cuil' => $request->get('cuil'),
            'burndate' => $burndate,
            // 'password' => bcrypt($request->get('password'))
        ]);
        return redirect()->route('persons.index')->with('toast_success', 'Persona '.$person->nameComplete.' creada');
    }
    public function edit($id ){
        $person = Person::findOrFail($id);
        return view('persons/edit',compact('person'));
    }

    public function update(Request $request,$id ){

        $burndate = Carbon::createFromFormat('d/m/Y', $request->input('burndate'));
        $person  = Person::findOrFail($id);
        $person->name = $request->get('name');
        $person->surname = $request->get('surname');
        $person->dni = $request->get('dni');
        $person->cuil = $request->get('cuil');
        $person->burndate =  $burndate;

        return redirect()->route('persons.index')->with('toast_success', 'Persona '.$person->nameComplete.' modificada');
    }

    public function destroy($id){
        $person = Person::findOrFail($id);
        $person->delete();
        return response()->noContent();
    }
}
