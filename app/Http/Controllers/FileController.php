<?php

namespace App\Http\Controllers;

use App\File;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->type == 'admin')
            $data['files'] = File::all()->toArray();
        else
            $data['files'] = User::find(Auth::id())->Files()->get()->toarray();
	foreach ($data['files'] as $key=> $value)
            $data['files'][$key]["mime_type"] = $this->fileTypeFontAwesome($value["mime_type"]);
        return view('admin.files', $data);
    }

    public function destroy($id)
    {
        File::destroy($id);
        return redirect()->back();
    }
}
