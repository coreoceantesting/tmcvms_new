<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\VisitingPurpose;
use App\Models\Visitors;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $department = Department::where('is_delete','0')->get();
        $VisitingPurpose = VisitingPurpose::where('is_delete','0')->get();
        return view('entry_form',compact('department','VisitingPurpose'));
    }

    public function store_entry(Request $request)
    {

        $this->validate($request, [
            'photo' => 'required|image',
            'name' => 'required',
            'organization' => 'required',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'purpose_of_visit'=>'required',
            'visiting_dept' => 'required',
            'to_visit' => 'required',
         ]);

         if ($request->hasFile('photo')) {
            // Specify the folder where you want to save the images
            $folderName = 'admin/img';

            // Get the uploaded file
            $imageFile = $request->file('photo');

            // Generate a unique filename for the image (e.g., using timestamp)
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();

            // Move the uploaded file to the specified folder
            $imageFile->move(public_path($folderName), $imageName);


            $myimage = $folderName . '/' . $imageName;
        }

         Visitors::create([
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'organization' => $request->input('organization'),
            'purpose_of_visit' => $request->input('purpose_of_visit'),
            'visiting_dept' => $request->input('visiting_dept'),
            'to_visit' => $request->input('to_visit'),
            'entry_datetime' => Carbon::now(),
            'photo' => $myimage,
        ]);
         return redirect()->route('entry.view')->with('success', 'Visitor is successfully Store');
    }

    public function view_entry()
    {
        return 'Successfully added...!';
    }
}
