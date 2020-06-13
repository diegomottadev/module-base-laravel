<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\Company;
use App\Contact;
use App\Country;
use App\Http\Controllers\Controller;
use App\Person;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Response;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

       
    }

    public function showRegistrationForm()
    {
        $countries = Country::all();
        return view('auth.register',compact('countries'));
    }


    public function register(Request $request)
    {
        //$this->validator($request->all())->validate();
        dd($request->all());
        event(new Registered($user = $this->create($request->all())));
        
        $person = Person::create($request->all());
        $contact = Contact::create($request->all());
        $address = Address::create($request->all());
        $person->contact()->associate($contact);
        $person->address()->associate($address);
        $person->save();

        $company = new Company();

        $company->name = $request->get('nameCompany');
        $company->cuit = $request->get('cuit');
        $company->trajectory = $request->get('trajectory');
        $company->compromise= $request->get('compromise');
        $company->technologies= $request->get('technologies');
        $company->others = $request->get('others');
        $company->save();
        $company->contact()->create([
            "email"=> $request->get("emailCompany"),
            "web"=> $request->get("webCompany"),
            "celphone"=> $request->get("celphoneCompany"),
            "telphone"=> $request->get("telphoneCompany"),
        ]);
        $company->address()->create([
            "address"=> $request->get("companyaddress"),
            "dpto"=> $request->get("companydpto"),
            "floor"=> $request->get("companyfloor"),
            "country_id"=> $request->get("companycountry"),
            "province_id"=> $request->get("companyprovince"),
            "city_id"=> $request->get("companycity"),
            "town_id"=> $request->get("companytown"),
        ]);
        
        $person->company()->associate($company);
        $person->save();

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new Response('', 201)
                    : redirect($this->redirectPath());
    }
}
