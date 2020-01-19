<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class Users extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function store(Store $request)
    {
        $post = $request->all();
        $post['password'] = Hash::make($request['password']);
        User::create($post);

        return redirect()->route('users.index');
    }


    public function update($id, Update $request)
    {
        if (trim($request->password) == '') {
            $post = $request->except('password');
        }else {
            $post = $request->all();
            $post['password'] = Hash::make($post['password']);
        }

        User::findOrFail($id)->update($post);

        return redirect()->route('users.index');
    }

}
