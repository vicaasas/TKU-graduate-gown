<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SystemController extends Controller
{
    public function index()
    {
        return view('admin.system.index');
    }

    public function new_user(Request $request)
    {
        $this->validateUser($request);

        $user = new User();
        if ($request->has('name')) {
            // 學生
            $user->username = $request->stu_id;
            $user->password = bcrypt(substr($request->stu_id, -6));
            $user->name = $request->name;
            $user->department = $request->department;
            $user->class = $request->class;
        } else {
            // 管理員
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->role = User::ROLE_ADMIN;
        }
        $user->base64Img = '';
        $user->save();

        $request->session()->flash('success', '使用者新增成功！');
        return $this->redirectAfterDone();
    }

    private function validateUser(Request $request)
    {
        if ($request->has('name')) {
            // 學生
            $request->validate([
                'stu_id' => 'required|numeric',
                'name' => 'required|string',
                'department' => [
                    'required',
                    Rule::in([User::DEPARTMENT_BACHELOR, User::DEPARTMENT_MASTER, User::DEPARTMENT_DOCTOR]),
                ],
                'class' => 'required|string',
            ]);
        } else {
            // 管理員
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|confirmed|string|min:8',
            ]);
        }

    }

    private function redirectAfterDone()
    {
        return redirect()->route('system.index');
    }

    public function dropStudents(Request $request)
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            $order->delete();
        }

        $students = User::all()->where('role', User::ROLE_STUDENT);
        foreach ($students as $student) {
            $student->delete();
        }

        $request->session()->flash('success', '資料清除完畢！');
        return $this->redirectAfterDone();
    }
}
