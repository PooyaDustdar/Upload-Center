<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(){
        return view('admin.users', ['users' => User::paginate(8)]);
    }
    public function destroy($id){
        User::destroy($id);
        return redirect()->back();
    }
    public function edit($id){
        return view('admin.FormEditeUser',User::find($id));
    }
    public function update($id){
        $user=User::find($id);
        $user->size = Input::get('size')*1024;
        $user->name = Input::get('name');
        $user->type = Input::get('type');
        $user->save();
        return redirect()->to("/users");
    }
    public function show($id){
        $data['files'] = User::find($id)->Files()->get()->toarray();
        foreach ($data['files'] as $key => $value)
            $data['files'][$key]["mime_type"] = $this->fileTypeFontAwesome($value["mime_type"]);
        return view('admin.files', $data);
    }
}
