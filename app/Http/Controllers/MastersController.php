<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Export;
use App\Models\Visitors;
use App\Models\Department;
use App\Models\User;
use App\Models\VisitingPurpose;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class MastersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // visiting department section start

    public function index(Request $request)
    {
        $name = $request->input('name');

        $query = Department::query();

        if ($name) 
        {
            $query->where('name', 'like', '%' . $name . '%');
        }

        $list = $query->where('is_delete','0')->get();

       return view('Masters.departmentlist',compact('list'));
    }

    public function add_department()
    {
        return view('Masters.add_department');
    }

    public function store_department(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
         ]);
         Department::create([
            'name' => $request->input('name'),
        ]);
         return redirect()->route('list.department')->with('success', 'Department is successfully Store');
    }

    public function edit_department($id)
    {
        $department = Department::findOrFail($id);
        return view('Masters.edit_department', compact('department'));
    }

    public function update_department(Request $request, $id)
    {
        $item = Department::findOrFail($id); // Replace 'Item' with your model
        $item->update([
            'name' => $request->input('name'),
        ]);
    
        return redirect()->route('list.department')->with('success', 'Department updated successfully.');
    }

    public function delete_department($id)
    {
        $item = Department::findOrFail($id);
        // dd($item); // Replace 'Item' with your model
        $item->update([
            'is_delete' =>'1'
        ]);
    
        return redirect()->route('list.department')->with('success', 'Department deleted successfully.');
    }

    // purpose for Visit Section Start

    public function visiting_purpose_list(Request $request)
    {
        $name = $request->input('name');

        $query = VisitingPurpose::query();

        if ($name) 
        {
            $query->where('name', 'like', '%' . $name . '%');
        }

        $list = $query->where('is_delete','0')->get();

       return view('Masters.visiting_purpose_list',compact('list'));
    }

    public function add_visiting_purpose()
    {
        return view('Masters.add_visiting_purpose');
    }

    public function store_visiting_purpose(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
         ]);
         VisitingPurpose::create([
            'name' => $request->input('name'),
        ]);
         return redirect()->route('list.visiting_purpose')->with('success', 'Visiting purpose is successfully Store');
    }

    public function edit_visiting_purpose($id)
    {
        $visit = VisitingPurpose::findOrFail($id);
        return view('Masters.edit_visiting_purpose', compact('visit'));
    }

    public function update_visiting_purpose(Request $request, $id)
    {
        $item = VisitingPurpose::findOrFail($id); // Replace 'Item' with your model
        $item->update([
            'name' => $request->input('name'),
        ]);
    
        return redirect()->route('list.visiting_purpose')->with('success', 'Visiting purpose updated successfully.');
    }

    public function delete_visiting_purpose($id)
    {
        $item = VisitingPurpose::findOrFail($id);
        // dd($item); // Replace 'Item' with your model
        $item->update([
            'is_delete' =>'1'
        ]);
    
        return redirect()->route('list.visiting_purpose')->with('success', 'Visiting purpose deleted successfully.');
    }

    // user registration section start
    
    public function users_list(Request $request)
    {
        $name = $request->input('name');
        $user_type = $request->input('role');

        $query = User::query();

        if ($name) 
        {
            $query->where('name', 'like', '%' . $name . '%');
        }

        if ($user_type) 
        {
            $query->where('role',$user_type);
        }

        $user_list = $query->where('is_delete','0')->get();
        return view('Masters.users_register',compact('user_list'));
    }

    public function add_users()
    {
        $department = Department::where('is_delete','0')->get();
        return view('Masters.add_users',compact('department'));
    }

    public function store_users(Request $request)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mobileno' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'empid' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
         ]);

         User::create([
            'name' => $request->input('first_name'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'mobno' => $request->input('mobileno'),
            'gender' => $request->input('gender'),
            'empid' => $request->input('empid'),
            'username' => $request->input('username'),
            'department' => $request->input('dept'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),   
        ]);

        return redirect()->route('list.users')->with('success', 'User is successfully Register');
    }

    public function edit_users(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $department = Department::where('is_delete','0')->get();
        return view('Masters.edit_user', compact('user','department'));
    }

    public function update_users(Request $request, $id)
    {
        $item = User::findOrFail($id); // Replace 'Item' with your model
        $item->update([
            'name' => $request->input('first_name'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'mobno' => $request->input('mobileno'),
            'gender' => $request->input('gender'),
            'empid' => $request->input('empid'),
            'username' => $request->input('username'),
            'department' => $request->input('dept'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
        ]);
    
        return redirect()->route('list.users')->with('success', 'User is successfully Updated.');
    }

    public function delete_users($id)
    {
        $item = User::findOrFail($id);
        // dd($item); // Replace 'Item' with your model
        $item->update([
            'is_delete' =>'1'
        ]);
    
        return redirect()->route('list.users')->with('success', 'User is deleted successfully.');
    }


}
