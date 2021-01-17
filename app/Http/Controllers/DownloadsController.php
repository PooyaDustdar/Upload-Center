<?php

namespace App\Http\Controllers;

use App\Downloads;
use App\File;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DownloadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }
    public function index()
    {
        $downloads_links_current_user= User::find(Auth::id());
        $downloads_links_current_user= $downloads_links_current_user->load('FilesDownloads.File');
        return view('admin.downloads',['links'=>$downloads_links_current_user->FilesDownloads]);
    }
    public function destroy($id)
    {
        Downloads::destroy($id);
        return redirect()->back();
    }
}
