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
        $todayExitVisitorsCount = DB::table('visitors')->whereDate('entry_datetime', $today)->where('exit_datetime','!=','')->count();
        $todayPendingExitCount = DB::table('visitors')->whereDate('entry_datetime', $today)->where('exit_datetime','=',null)->count();

        return view('home',compact('todayEntryVisitorsCount','todayExitVisitorsCount','todayPendingExitCount'));
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
            return back()->with('error', 'This visitor pass id is already assigend to someone please use diffrent pass id.');
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
         return back()->with('success', 'Visitor is successfully Store');
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

        $visitors = $query->get();
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

        $visitors = $query->get();
        $department = Department::where('is_delete','0')->get();
        $VisitingPurpose = VisitingPurpose::where('is_delete','0')->get();
        // $visitors = Visitors::all();
        return view('entry_visitor_list',compact('visitors','department','VisitingPurpose'));
    }

}