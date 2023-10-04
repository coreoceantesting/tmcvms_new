<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Export;
use App\Models\Visitors;
use App\Models\VisitingPurpose;
use App\Models\Department;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::now()->toDateString();

        $todayEntryVisitorsCount = DB::table('visitors')->whereDate('entry_datetime', $today)->count();
        $todayExitVisitorsCount = DB::table('visitors')->whereDate('entry_datetime', $today)->where('exit_datetime','!=',null)->count();
        $todayPendingExitCount = DB::table('visitors')->whereDate('entry_datetime', $today)->where('exit_datetime','=',null)->count();
        $durationInMinutes = 3 * 60; // 3 hours * 60 minutes/hour
        $durationInMinutesnew = 3 * 60; // 3 hours * 60 minutes/hour

        $morethanthreehourscount = DB::table('visitors')
            ->select(DB::raw('COUNT(*) as count'))
            ->whereRaw('TIMESTAMPDIFF(MINUTE, entry_datetime, exit_datetime) > ?', [$durationInMinutes])
            ->first()
            ->count;

            $morethanfivehourscount = DB::table('visitors')
            ->select(DB::raw('COUNT(*) as count'))
            ->whereRaw('TIMESTAMPDIFF(MINUTE, entry_datetime, exit_datetime) > ?', [$durationInMinutesnew])
            ->first()
            ->count;

        return view('home',compact('todayEntryVisitorsCount','todayExitVisitorsCount','todayPendingExitCount','morethanthreehourscount','morethanfivehourscount'));
    }

    public function register_visitor()
    {
        $department = Department::where('is_delete','0')->get();
        $VisitingPurpose = VisitingPurpose::where('is_delete','0')->get();
        return view('register_visitor',compact('department','VisitingPurpose'));
    }

    public function store_visitor(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'organization' => 'required',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'purpose_of_visit'=>'required',
            'visiting_dept' => 'required',
            'to_visit' => 'required',
            'pass_id' => 'required'
         ]);

         $unique_pass_id = Visitors::where('pass_id',$request->input('pass_id'))->where('exit_datetime',null)->count();
         if($unique_pass_id > 0)
         {
            return redirect()->route('register.visitor')->with('error', 'This visitor pass id is already assigend to someone please use diffrent pass id.');
         }

         Visitors::create([
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'organization' => $request->input('organization'),
            'purpose_of_visit' => $request->input('purpose_of_visit'),
            'visiting_dept' => $request->input('visiting_dept'),
            'to_visit' => $request->input('to_visit'),
            'pass_id' => $request->input('pass_id'),
            'entry_datetime' => Carbon::now(),
        ]);
         return redirect()->route('register.visitor')->with('success', 'Visitor is successfully Store');
    }

    public function exit_list_visitor(Request $request)
    {
        // $visitors = Visitors::all();

        $name = $request->input('name');
        $mobno = $request->input('mobnumber');
        $dept = $request->input('dept');
        $passid = $request->input('passid');

        $query = visitors::query();

        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        if ($mobno) {
            $query->where('mobile', $mobno);
        }

        if ($dept) {
            $query->where('visiting_dept', $dept);
        }

        if ($passid) {
            $query->where('pass_id', $passid);
        }

        $visitors = $query->where('exit_datetime',null)->orderBy('id','desc')->get();
        $department = Department::where('is_delete','0')->get();
        $VisitingPurpose = VisitingPurpose::where('is_delete','0')->get();

        return view('visitor_list',compact('visitors','department','VisitingPurpose'));
    }

    public function entry_list_visitor(Request $request)
    {
        $name = $request->input('name');
        $mobno = $request->input('mobnumber');
        $dept = $request->input('dept');
        $oragnization = $request->input('oraganization');

        $query = visitors::query();

        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        if ($mobno) {
            $query->where('mobile', $mobno);
        }

        if ($dept) {
            $query->where('visiting_dept', $dept);
        }

        if ($oragnization) {
            $query->where('organization', 'like', '%' . $oragnization . '%');
        }

        $visitors = $query->where('exit_datetime',null)->orderBy('id','desc')->get();
        $department = Department::where('is_delete','0')->get();
        $VisitingPurpose = VisitingPurpose::where('is_delete','0')->get();
        // $visitors = Visitors::all();
        return view('entry_visitor_list',compact('visitors','department','VisitingPurpose'));
    }

    public function update_visitor_exit_time($id)
    {
        $user = Visitors::find($id);
        if (!$user) {
            abort(404); // User not found
        }
        // Update the exit time for the user
        $user->exit_datetime = now(); // Set the exit time to the current datetime
        $user->save();
        return redirect()->route('exitlist.visitor')->with('success', 'Exit time updated successfully');
    }

    public function exited_list_visitor(Request $request)
    {
        // $visitors = Visitors::all();

        $name = $request->input('name');
        $mobno = $request->input('mobnumber');
        $dept = $request->input('dept');
        $passid = $request->input('passid');

        $query = visitors::query();

        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        if ($mobno) {
            $query->where('mobile', $mobno);
        }

        if ($dept) {
            $query->where('visiting_dept', $dept);
        }

        if ($passid) {
            $query->where('pass_id', $passid);
        }

        $visitors = $query->where('exit_datetime','!=',null)->orderBy('id','desc')->get();
        $department = Department::where('is_delete','0')->get();
        $VisitingPurpose = VisitingPurpose::where('is_delete','0')->get();

        return view('exited',compact('visitors','department','VisitingPurpose'));
    }

}