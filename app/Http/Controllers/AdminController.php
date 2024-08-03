<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //change password page
    public function changePasswordPage()
    {
        return view('admin.account.changePassword');
    }

    public function changePassword(Request $request)
    {
        // validation
        $this->passwordValidationCheck($request);

        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbHashValue = $user->password;
        if (Hash::check($request->oldPassword, $dbHashValue)) {
            $data = [
                'password' => Hash::make($request->newPassword)
            ];
            User::where('id', Auth::user()->id)->update($data);
            // Auth::logout();
            return back()->with(['changePassword' => 'Changed Successfully']);
        }
        return back()->with(['notMatch' => 'Credential does not match']);
    }

    //account info deatils
    public function details()
    {
        return view('admin.account.details');
    }
    //account profile edit
    public function edit()
    {
        return view('admin.account.edit');
    }
    //update account
    public function update($id, Request $request)
    {
        $this->accountValidationCheck($request);
        $data = $this->getUserData($request);
        if ($request->hasFile('image')) {
            // old image name | check =>delete | store
            $dbImage = User::where('id', $id)->first();
            $dbImage = $dbImage->image;

            if ($dbImage != null) {
                Storage::delete('public/' . $dbImage);
            }

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }
        User::where('id', $id)->update($data);
        return redirect()->route('admin#details')->with(['updateSuccess' => 'Admin Account Updated...']);
    }

    //admin list
    public function list()
    {
        $admin = User::when(request('key'), function ($query) {
            $query->orWhere('name', 'like', '%' . request('key') . '%')
                ->orWhere('email', 'like', '%' . request('key') . '%')
                ->orWhere('gender', 'like', '%' . request('key') . '%')
                ->orWhere('phone', 'like', '%' . request('key') . '%')
                ->orWhere('address', 'like', '%' . request('key') . '%');
        })
            ->where('role', 'admin')->paginate(3);

        $admin->appends(request()->all());
        return view('admin.account.list', compact('admin'));
    }

    //delete account
    public function delete($id)
    {
        User::where('id', $id)->delete();
        return back()->with(['deleteSuccess' => 'Admin Account Deleted.']);
    }

    //change Role
    public function changeRole($id)
    {
        $account = User::where('id', $id)->first();
        return view('admin.account.changeRole', compact('account'));
    }

    //change
    public function change(Request $request, $id)
    {
        $data = $this->requestUserData($request);
        User::where('id', $id)->update($data);
        return redirect()->route('admin#list');
    }
    //request user data


    //account list
    public function accountList(){
        $admin = User::get();

        return view('admin.account.accountList',compact('admin'));
    }

    //ajax account role change
    public function ajaxAccountRoleChange(Request $request){
        // logger($request->all());
        User::where('id', $request->userId)->update(['role'=> $request->role]);
    }
    private function requestUserData($request)
    {
        return [
            'role' => $request->role
        ];
    }
    private function getUserData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ];
    }
    private function accountValidationCheck($request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'image' => 'mimes:png,jpg,jpeg | file',
            'address' => 'required'
        ], [])->validate();
    }
    private function passwordValidationCheck($request)
    {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:8',
            'newPassword' => 'required|min:8',
            'confirmPassword' => 'required|min:8|same:newPassword'
            // same validation => same as password
        ], [
            'oldPassword.required' => 'this field is required!',
            'newPassword.required' => 'this field is required!',
            'confirmPassword.required' => 'this field is required!'
        ])->validate();
    }
}
