<?php

namespace App\Http\Controllers\Backend\AdminControllers;

use App\Http\Controllers\Controller;
use App\Person;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::with(['person','roles'])->paginate(10);
        return view('admin/security/users/index', compact('users'));
    }

    public function new()
    {
        $roles = $this->getRoles();
        return view('admin/security/users/new', compact('roles'));
    }

    public function show($id)
    {
        $user  = User::findOrFail($id);
        return view('admin/security/users/show', compact('user'));
    }

    public function store(Request $request)
    {
    
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
            
        ]);

        if ($request->get('person')!=null){
            $person = Person::findOrFail($request->get('person'));
            $person->user_id = $user->id;
            $person->save();
        }
        
        $user->assignRole($request->get('roles'));

        return redirect()->route('users.index')->with('toast_success', 'Usuario ' . $user->name . ' creada');
    }
    public function edit($id)
    {
        $roles = $this->getRoles();
        $user = User::with(['roles','person'])->findOrFail($id);
        return view('admin/security/users/edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {

        $user  = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->syncRoles($request->get('roles'));


        if ($request->get('person')!=null){
            $person = Person::findOrFail($request->get('person'));
            $person->user_id = $user->id;
            $person->save();
        }

        $user->save();
        return redirect()->route('users.index')->with('toast_success', 'Usuario ' . $user->name . ' modificada');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->noContent();
    }

    private function getRoles()
    {

        $tmp = Role::all();

        return $tmp;
    }

   

    public function getPersons(Request $request)
    {
            $page = $request->page;
            $resultCount = 10;
            $offset = ($page - 1) * $resultCount;

            $persons = Person::orderBy('name')
            ->skip($offset)
            ->take($resultCount)
            ->selectRaw('id,nameComplete as text')
            ->get();

            $count = Count(Person::orderBy('name')
            ->selectRaw('id,nameComplete as text')
            ->get());

            if ( $request->term!= null){
                $persons = Person::where('nameComplete', 'LIKE', '%' . $request->term . '%')
                ->orderBy('name')
                ->skip($offset)
                ->take($resultCount)
                ->selectRaw('id, nameComplete as text')
                ->get();

                $count = Count(Person::where('nameComplete', 'LIKE', '%' . $request->term . '%')
                ->orderBy('name')
                ->selectRaw('id,nameComplete as text')
                ->get());
            }

            $endCount = $offset + $resultCount;
            $morePages = $count > $endCount;
            $results = array(
                "results" => $persons,
                "pagination" => array(
                    "more" => $morePages
                )
            );

            return response()->json($results);
    }
}
