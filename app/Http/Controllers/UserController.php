<?php namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    /**
     * When class is instantiated start by see if the user is logged in
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     * Before the method is called, validate the user input
     *
     * @param CreateUserRequest $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        if ($request['generate_password'] == true) {
            $password = str_random(8);
        } else {
            $password = $request['password'];
        }

        User::create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'company' => $request['company'],
            'email' => $request['email'],
            'user_type' => $request['user_type'],
            'password' => bcrypt($password),
            'vat_number' => $request['vat_number'],
            'zipcode' => $request['zipcode'],
            'city' => $request['city'],
            'street' => $request['street'],
            'phone' => $request['phone'],
        ]);

        if ($request['generate_password'] == true) {
            Mail::raw('Here is your password: ' . $password, function ($message) use($request) {
                $message->to($request['email'])->subject('Welcome to worknicer.dk');
            });
        }

        return redirect('/users');
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);

        if ($user->fk_user != Auth::user()->id && Auth::user()->user_type != 'superadmin') {
            abort(403, 'This is not your client');
        }

        return view('user.edit', compact('user'));
    }

    public function update($user_id, UserRequest $request)
    {
        $user = User::findOrFail($user_id);

        $user->update($request->all());

        return redirect('/users');
    }
}
