<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;
use App\Models\Designations;
use App\Models\User;

class StaffController extends Controller
{
    public function index()
    {
        return view('staff.staff-tables',[
            'departments' => Departments::all(),
            'designations' => Designations::all(),
            'staffs' => User::all(),
        ]);
    }

    public function addDepartment(Request $request)
    {
        $request->validate([
            'department' => 'required',
        ]);
        Departments::create([
            'department_name' => $request->department,
        ]);
        return redirect()->back();
    }

    public function addDesignation(Request $request)
    {
        $request->validate([
            'designation' => 'required',
        ]);
        Designations::create([
            'designation_name' => $request->designation,
        ]);
        return redirect()->back();
    }

    public function addStaff(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'department' => 'required',
            'designation' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'phone_no' => $request->phone,
            'department_id' => $request->department,
            'designation_id' => $request->designation,
        ]);
        return redirect()->back();
    }

    public function search(Request $request, $term = NULL)
    {
        if($term == NULL) {
            return view('staff.search-staff',[
                'staffs' => User::all(),
                'term' => NULL,
            ]);
        } else {
            $staff = new User();
            $staffs = $staff->join('hr.departments', 'hr.users.department_id', '=', 'hr.departments.department_id')
                        ->join('hr.designations', 'hr.users.designation_id', '=', 'hr.designations.designation_id')
                        ->where('hr.users.name', 'ilike', "%$term%")
                        ->orWhere('hr.departments.department_name', 'ilike', "%$term%")
                        ->orWhere('hr.designations.designation_name', 'ilike', "%$term%")
                        ->orderBy('name')->orderBy('department_name')->orderBy('designation_name')
                        ->get();
            return view('staff.search-staff',[
                'staffs' => $staffs,
                'term' => $term,
            ]);
        }
    }
}
