<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Auth;

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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Send welcome email
        Mail::send('emails.welcome', ['details' => $user], function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Compte créé avec succès');
        });
    // Log the user in
        Auth::login($user);

        return $user;
    }

    public function registerGuest(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if (!$user) {
            $userData = [
                'first_name' => $request->name,
                'phone' => $request->phone,
                'guest' => true,
            ];
            
            if ($request->filled('address')) {
                $userData['address'] = $request->address;
            }
            
            if ($request->filled('info')) {
                $userData['info'] = $request->info;
            }
            
            $user = User::create($userData);

            Auth::login($user);

            return redirect('summaryPage');

        } 
        // elseif (!$user->guest) {
        //     return back()->withErrors([
        //         'phone' => 'The provided phone number is already in use by a customer.',
        //     ]);
        // }
        if($user) {
            $useremail = $user->email;
            if($useremail == null) {
            Auth::login($user);
            } else {
                return redirect()->route('login')->withErrors([
                    'email' => "Vous avez déjà un compte avec votre numéro et votre adresse e-mail, connectez-vous d'abord pour continuer.",
                ]);
            }
        }    
        
        return redirect('summaryPage');
    }
}
