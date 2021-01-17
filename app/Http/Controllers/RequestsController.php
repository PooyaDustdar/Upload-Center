<?php

namespace App\Http\Controllers;

use App\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class RequestsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function create(){
        return view('admin.FormRequest');
    }
    public function index(){
        if (Auth::user()->type == 'admin') {
            $data["data"] = Request::all();
        } elseif (Auth::user()->type == 'user')
            $data["data"] = User::find(Auth::id())->Requests()->get();
        return view('admin.requests', $data);
    }
    public function store(){
        Request::create([
            "subject" => Input::get("subject"),
            "content" => Input::get("content"),
            "level" => Input::get("level"),
            "user_id" => Auth::id()
        ]);
        return redirect()->to("requests");
    }
    public function show($id){
        return view('admin.ShowRequest',Request::find($id));
    }
    public function destroy($id){
        Request::destroy($id);
        return redirect()->back();
    }
}