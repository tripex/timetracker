<?php namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller {

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
	public function store(CreateUserRequest $request)
	{
        User::create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'company' => $request['company'],
            'email' => $request['email'],
            'user_type' => $request['user_type'],
            'password' => bcrypt($request['password']),
        ]);

        return redirect('/users');
	}
}
