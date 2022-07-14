<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseAdminController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function listing()
    {
        parent::listing();
        $data['config'] = $this->getConfig();
        $data['records'] = $this->getPosts();
        return view($this->section('listing'), $data);
    }

    public function detail($id = '')
    {
        parent::detail($id);
        $data['config'] = $this->getConfig();
        $data['record'] = $this->getPost($id);
        $data['roles'] = \App\Role::all()->toArray();
        $data['id'] = $id;
        return view($this->section('detail'), $data);
    }

    public function arrangement($id = '')
    {
        $data['config'] = $this->getConfig();
        $data['records'] = $this->getAllPosts();
        return view($this->section('arrangement'), $data);
    }

    public function postsQuery($route_params, $query){
        return $query;
    }

    public function beforeSave(Request $request, $customData = []){

        Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users,username,' . request('id'),
            'email' => 'required|email|unique:users,email,' . request('id'),
            'role_id' => 'required',
            'new_password' => 'nullable|required_if:id,0|confirmed|min:8',
            'current_admin_password' => 'exclude_if:id,0|nullable|required_with:new_password|password:web',
        ], [
            'new_password.required_if' => 'The password field is required',
            'current_admin_password.password' => 'Current admin password does not match.',
        ], [
            'role_id' => 'role',
            'new_password' => 'password',
        ])->validate();

        if($new_password = request('new_password')){
            $customData['password'] = Hash::make($new_password);
        }

        return $customData;
    }

    public function afterSave(Request $request, $customData = [], $model){

    }

    public function afterDelete(Request $request, $model){

    }

}
