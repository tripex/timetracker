<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Client;
use App\Http\Requests\ClientRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller {

    /**
     * When class is instantiated start by see if the user is logged in
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a list of clients attached to the user
     *
     * return clients to the view
     */
    public function index()
    {
        // If superadmin just get all from all accounts
        if(Auth::user()->user_type == 'superadmin')
        {
            $clients = Client::all();
        }
        // Else if admin only get worklogs owned by the user
        else
        {
            $clients = Client::where('fk_user', Auth::id())->get();
        }

        return view('client.index', compact('clients'));
    }


    /**
     * Get the create client view
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store the client in the database
     *
     * @param ClientRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ClientRequest $request)
    {
        Client::create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'company' => $request['company'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'fk_user' => Auth::id(),
            'vat_number' => $request['vat_number'],
            'zipcode' => $request['zipcode'],
            'city' => $request['city'],
            'street' => $request['street'],
            'hourly_rate' => $request['hourly_rate'],
        ]);

        return redirect('/clients');
    }

    public function edit($client_id)
    {
        $client = Client::find($client_id);

        if($client->fk_user != Auth::user()->id && Auth::user()->user_type != 'superadmin')
        {
            abort(403,'This is not your client');
        }

        return view('client.edit', compact('client'));
    }

    public function update($client_id, ClientRequest $request)
    {
        $client = Client::findOrFail($client_id);

        $client->update($request->all());

        return redirect('/clients');
    }

    public function getCvrInformations($vat)
    {
        // Strip all other characters than numbers
        $vat = preg_replace('/[^0-9]/', '', $vat);


        // Check whether VAT-number is invalid
        if( empty($vat) )
        {

            // Print error message
            return('Venligst angiv et CVR-nummer.');

        }else{
            //return 'http://cvrapi.dk/api?search=' . $vat . '&country=DK';
            // Start cURL
            $ch = curl_init();

            // Set cURL options
            curl_setopt($ch, CURLOPT_URL, 'http://cvrapi.dk/api?search=' . $vat . '&country=dk');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, 'WorkNicer');

            // Parse result
            $result = curl_exec($ch);

            // Close connection when done
            curl_close($ch);

            // Return our decoded result
            return json_decode($result, 1);
        }
    }
}
