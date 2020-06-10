<?php

namespace App\Http\Controllers\Backend\AdminControllers;

use App\Address;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PersonController extends Controller
{
    //
    public function index()
    {
        $persons = Person::paginate(10);
        return view('persons/index', compact('persons'));
    }

    public function new()
    {
        return view('persons/new');
    }

    public function show($id)
    {
        $person  = Person::findOrFail($id);
        return view('persons/show', compact('person'));
    }

    public function store(Request $request)
    {   
        $person = Person::create($request->all());
        $contact = Contact::create($request->all());
        $address = Address::create($request->all());
        $person->contact()->associate($contact);
        $person->address()->associate($address);
        $person->save();

        return redirect()->route('persons.index')->with('toast_success', 'Persona ' . $person->nameComplete . ' creada');
    }
    public function edit($id)
    {
        $person = Person::with(['contact','address'])->findOrFail($id);
        return view('persons/edit', compact('person'));
    }

    public function update(Request $request, $id)
    {

        $person  = Person::with(['contact','address'])->findOrFail($id);
        $person->update($request->all());
        $contact = $person->contact;
        $contact->update($request->all());
        $address = $person->address;
        $address->update($request->all());
        
        return redirect()->route('persons.index')->with('toast_success', 'Persona ' . $person->nameComplete . ' modificada');
    }

    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        $person->delete();
        return response()->noContent();
    }
}
