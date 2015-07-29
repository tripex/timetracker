<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Worklog;

class DashboardController extends Controller {

    protected $user;
    protected $total_invoiced;

    /**
  	 * Create a new controller instance.
  	 *
  	 * @return void
  	 */
  	public function __construct()
  	{
  		$this->middleware('auth');
        $this->user = Auth::user();
  	}

  	/**
  	 * Show the application dashboard to the user.
  	 *
  	 * @return dashboard view
  	 */
  	public function index()
  	{
        $number_of_clients = count($this->user->clients);
        $hours_worked_this_week = $this->hoursWorkedThisWeek();
        $invoiced_this_month = $this->invoicedThisMonth();
        $works = $this->getLastTenWorklogRows();

        return view('dashboard', compact('hours_worked_this_week','invoiced_this_month','number_of_clients','works'));
  	}

    /**
     * Get the hours worked in the present week for the user that is logged in.
     *
     * @return hours worked in the present week
     */
    private function hoursWorkedThisWeek()
    {
        $monday = Carbon::parse('this monday')->format('Y-m-d');
        $sunday = Carbon::parse('this sunday')->format('Y-m-d');

        $hours_worked = Worklog::where('work_date_start','>=',$monday)
            ->Where('work_date_end','<=',$sunday)
            ->where('fk_user','=',$this->user->id)
            ->sum('hours_used');

        return $hours_worked;
    }

    private function invoicedThisMonth()
    {
        $first_day = Carbon::parse('first day of this month')->format('Y-m-d');
        $last_day = Carbon::parse('last day of this month')->format('Y-m-d');

        $arr_client_hours = Worklog::where('work_date_start','>=',$first_day)
            ->where('work_date_end','<=',$last_day)
            ->where('worklog.fk_user','=',$this->user->id)
            ->leftJoin('clients','worklog.fk_client','=','clients.id')
            ->get(['hours_used','hourly_rate']);

        $arr_client_hours = json_decode($arr_client_hours);

        foreach($arr_client_hours as $hour_and_rate)
        {
            $this->total_invoiced += $hour_and_rate->hours_used*$hour_and_rate->hourly_rate;
        }
        return number_format($this->total_invoiced,2,',','.');
    }

    private function getLastTenWorklogRows()
    {
        $works = Worklog::take(10)->where('fk_user', $this->user->id)->orderBy('created_at', 'desc')->get();

        return $works;
    }

}
