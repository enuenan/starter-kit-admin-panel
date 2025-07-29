<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSettingController extends Controller
{
    public function changePassword()
    {
        return view('dashboard.settings.password');
    }

    public function updatePassword(Request $request, $id)
    {
        $validateData = $request->validate([
            'old_password' => ['required', new MatchOldPassword, 'min:5'],
            'new_password' => ['required', 'min:5'],
            'confirm_password' => ['required', 'same:new_password', 'min:5'],
        ]);

        $changed_password = User::find(Auth::user()->id)->update(['password' => Hash::make($request['new_password'])]);

        if ($changed_password) {
            return redirect()->back()->with(['success' => 'Password updated successfully!']);
        } else {
            return redirect()->back()->with(['success' => 'Password update failed!']);
        }
    }

    public function profile()
    {
        return view('dashboard.settings.profile');
    }

    public function profileSettings(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'string|nullable',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->save();

        return redirect()->back()->with(['success' => 'Your profile has been successfully updated']);
    }

    public function editAppearance()
    {
        return view('dashboard.settings.appearance');
    }
}
