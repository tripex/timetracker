<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Worklog;
use App\Client;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorklogController extends Controller {

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a list of worklog entries
     *
     * @return worklog index view
     */
    public function index()
    {
        // If superadmin just get all from all accounts
        if(Auth::user()->user_type == 'superadmin')
        {
            $works = Worklog::orderBy('created_at', 'desc')->get();
        }
        // Else if admin only get worklogs owned by the user
        else
        {
            $works = Worklog::where('fk_user', Auth::id())->orderBy('created_at', 'desc')->get();
        }

        return view('worklog.index', compact('works'));
    }

    /**
     * Show the create worklog view
     *
     * @return worklog create view
     */
    public function create($client_id = null)
    {
        $clients = Client::where('fk_user', Auth::id())->get();

        return view('worklog.create', compact('clients', 'client_id'));
    }

    /**
     * Store the worklog entry in the database
     *
     * @param Request $requests
     * @return to worklog overview
     */
    public function store(Request $requests)
    {
        $odometer_start = $requests['odometer_start'];
        $odometer_end = $requests['odometer_end'];
        $kilometers = $odometer_end-$odometer_start;

        $work_date_start = Carbon::createFromFormat('d/m/Y H:i', $requests['work_date_start']);
        $work_date_end = Carbon::createFromFormat('d/m/Y H:i', $requests['work_date_end']);
        $hours_worked = ($work_date_end->diffInMinutes($work_date_start)/60);

        Worklog::create([
            'fk_client' => $requests['client'],
            'fk_user' => Auth::id(),
            'note' => $requests['note'],
            'work_date_start' => $work_date_start,
            'work_date_end' => $work_date_end,
            'odometer_start' => $requests['odometer_start'],
            'odometer_end' => $requests['odometer_end'],
            'kilometers' => $kilometers,
            'hours_used' => $hours_worked,
        ]);

        return redirect('/worklog');
    }
}
