<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getAllUsers($filter = [], $keywords = null){
        // $user = DB::select('SELECT * FROM users ORDER BY created_at DESC');
        $users = DB::table($this->table)
        ->orderBy('created_at', 'DESC')
        ->get();

        if(!empty($filters)){
            $users = $users->where($filters);
        }
        if(!empty($keywords)){
            $users = $users->where(function ($query) use ($keywords){
                $query->orWhere('name', 'like', '%'.$keywords.'%');
            });
        }

        // $users = $users->get();

        return $users;
    }

    public function addUser($data){
        DB::insert('INSERT INTO users (name, email, password, created_at) values (?, ?, ?, ?)', $data);
    }

    public function getDetail($id) {
        return DB::select('SELECT * FROM '.$this->table.' WHERE id=?', [$id]);
    }

    public function updateUser ($data, $id) {
        $data[] = $id;
        return DB::update('UPDATE '.$this->table.' SET name=?, email=?, password=?, updated_at=? where id = ?', $data);
    }

    public function deleteUser ($id) {
        return DB::delete("DELETE FROM $this->table WHERE id=?", [$id]);
    }

    public function learnQueryBuilder (){
        // Lấy tất cả bảng ghi của table (trả về 1 bảng muốn sử dụng thì phải duyệt mảng)
        $list = DB::table($this->table)
        ->get();
        // echo $list[0]->email;

        // Select 1 cột cụ thể trong bảng
        $column = DB::table($this->table)
        ->select('name as Tên', 'email')
        ->get();

        // Truy vấn có điều kiện (where) //<>khác, 
        $whereSelect = DB::table($this->table)
        // ->where('id', '=', 6)
        ->where('id', '>', 6)
        ->get();
        // dd($whereSelect);


        // Lấy 1 bảng ghi đầu tiên (trả về 1 object chỉ cần trỏ đến tên phần tử để sử dụng)
        $first = DB::table($this->table)->first();
        // dd($first->email);

        DB::enableQueryLog();
        $id = 8;
        $list = DB::table($this->table)
        ->select('name as Ten', 'email', 'id')
        ->where('name', 'like', '%phạm-%')
        ->get();
        // dd($list);

        $sql = DB::getQueryLog();
        // dd($sql);

    }
}
