<?php

namespace App\Http\Controllers;
// imports
use Illuminate\Http\Request;
use App\Models\usermanagementsystem;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLogin(){
        return view('users.login');
    }
    public function checkLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // find user with mail and check data
        $user = usermanagementsystem::where('email', $credentials['email'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)&&$credentials['email']==$user->email) {
            return redirect(route('users.dashboard'));
        }else{
            return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
    public function showDashboard(Request $request){
        // pagination
        $perPage = 5; // Display 5 user per page
        $currentPage = $request->input('page', 1);
        $users = usermanagementsystem::paginate($perPage, ['*'], 'page', $currentPage);
        // Calculate the average salary per department
        $usersForChart = usermanagementsystem::all();
        $avgSalaryPerDept = $usersForChart->groupBy('department')->map(function ($user, $department) {
            return $user->avg('salary_ctc');
        });

        // Calculate the total number of employees per department
        $totalEmployeesPerDept = $usersForChart->groupBy('department')->map(function ($user, $department) {
            return $user->count();
        });
        return view('users.dashboard', compact('users','avgSalaryPerDept', 'totalEmployeesPerDept'));
    }
    public function showCreateUser(){
        return view('users.createUser');
    }
    public function storeData(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'salary_ctc' => 'numeric|min:0',
            'department' => 'string|max:255',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $user = new usermanagementsystem;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->department = $validatedData['department'];
        $user->salary_ctc = $validatedData['salary_ctc'];

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/user/', $filename);
            $user->profile_picture = $filename;
        }
        $user->save();
        return redirect(route('users.dashboard'));
    }
}
