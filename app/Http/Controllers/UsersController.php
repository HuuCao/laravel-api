<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;

class UsersController extends Controller
{
    //
    private $users;

    public function __construct(){
        $this->users = new Users();
    }

    public $data = [];

    public function index(){
        $title = 'Danh sách người dùng';

        $this->users->learnQueryBuilder();

        $usersList = $this->users->getAllUsers();

        return view('clients.users.list', compact('title', 'usersList'));
    }

    public function add (){
        $title = 'Thêm người dùng';

        return view('clients.users.add', compact('title'));

    }

    public function postAdd (Request $request){
        $request->validate(
        [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ],
        [
            'name.required' => 'Họ tên bắt buộc nhập',
            'name.min' => 'Họ tên ít nhất 5 kí tự',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Password bắt buộc phải nhập',
            'password.min' => 'Password ít nhất 8 kí tự'
        ]);

        $dataInsert = [
            $request->name,
            $request->email,
            $request->password,
            date('Y-m-d H:i:s')
        ];

        $this->users->addUser($dataInsert);

        return redirect()->route('users.index')->with('msg', 'Thêm người dùng thành công!');
    }

    public function getEdit ($id=0) {
        $title = 'Cập nhật người dùng';

        if(!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            if(!empty($userDetail)){
                $userDetail = $userDetail[0];
            }else {
                return redirect()->route('users.index')->with('msg', 'Người dùng không tồn tai!');
            }
        }else {
            return redirect()->route('users.index')->with('msg', 'Liên kết không tồn tại');
        }

        return view('clients.users.edit', compact('title', 'userDetail'));
    }

    public function postEdit (Request $request, $id=0){
        $request->validate(
            [
                'name' => 'required|min:5',
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'required|min:8',
            ],
            [
                'name.required' => 'Họ tên bắt buộc nhập',
                'name.min' => 'Họ tên ít nhất 5 kí tự',
                'email.required' => 'Email bắt buộc phải nhập',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Password bắt buộc phải nhập',
                'password.min' => 'Password ít nhất 8 kí tự'
            ]);

            $dataUpdate = [
                $request->name,
                $request->email,
                $request->password,
                date('Y-m-d H:i:s')
            ];

        $this->users->updateUser($dataUpdate, $id);
        return back()->with('msg', 'Cập nhật thành công');
    }

    public function delete ($id=0) {
        if(!empty($id)) {
            $userDetail = $this->users->getDetail($id);
            if(!empty($userDetail)){
                $deleteStatus = $this->users->deleteUser($id);
                if($deleteStatus) {
                    $msg = 'Xóa người dùng thành công';
                } else {
                    $msg = 'Bạn không thể xóa người dùng';
                }
            }else {
                $msg = 'Người dùng không tồn tại';
            }
        }else {
            $msg = 'Liên kết không tồn tại';
        }
        return redirect()->route('users.index')->with('msg', $msg);
    }
}
