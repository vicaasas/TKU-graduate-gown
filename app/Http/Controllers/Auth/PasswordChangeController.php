<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordChangeController extends Controller
{
    public function change(Request $request)
    {
        $this->validatePassword($request);

        if ($request->input('user_old_password') == $request->input('new_password')) {
            $request->session()->flash('danger', '密碼需與原密碼不同！');
        } else{
            $this->saveNewPassword($request);
            $request->session()->flash('success', '密碼變更成功！');
        }
        return redirect()->route('profile');
    }

    protected function validatePassword(Request $request)
    {
        $request->validate([
            'user_old_password' => 'required|string|password',
            'new_password' => 'required|confirmed|string|min:8',
        ], [
            'required' => '此欄必填',
            'password' => '密碼不符',
            'string' => '必須使用文字',
            'new_password.confirmed' => '新密碼必須相同',
            'new_password.min' => '新密碼至少必須多於 :min 個字',
        ]);
    }

    protected function saveNewPassword(Request $request)
    {
        $user = User::find(Auth::id());
        $user->password = bcrypt($request->input('new_password'));
        $user->save();
    }
}
