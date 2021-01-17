<?php

namespace App\Http\Controllers;

use App\Downloads;
use App\File;
use App\User;
use DateTime;
use DateInterval;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $current_data = new DateTime(date('Y-m-d'));
        $files = DB::table('files')
            ->where('created_at', '>=', $current_data->format('Y-m-d 00:00:00'))
            ->where('created_at', '<=', $current_data->format('Y-m-d 23:59:59'))
            ->where('IPuser', \Request::getClientIp())
            ->get()->toarray();
        $images = [];

	foreach($files as $key => $val)
            $images[] = ['name' => $val->name, 'link' => url('/download/' . $val->id), 'image' => $this->fileTypeFontAwesome($val->mime_type)];
        return view('welcome', ['files' => $images]);
    }

    public function uploadFiles(Request $Request)
    {
        $input = $Request->all();
        if (Auth::check()) {
            $sizedb = User::find(Auth::id())->Files()->sum('size');
            $size_use = ($sizedb > 0) ? $sizedb : 0;
            $rules = array('file' => 'max:' . (Auth::user()->size - $size_use));
        } else {
            $rules = array('file' => 'max:3000000');
        }
        $validation = Validator::make($input, $rules);
        if (!$validation->fails()) {
            $destinationPath = 'uploads'; // upload path
            $extension = $Request->file('file')->getClientOriginalExtension(); // getting file extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $upload_success = $Request->file('file')->move($destinationPath, $fileName); // uploading file to given path
            $ip = $Request->getClientIp();
            if ($upload_success) {
                $file = new File();
                $file->name = $Request->file('file')->getClientOriginalName();
                $file->size = round($Request->file('file')->getClientSize() / 1024, 0);
                $file->mime_type = $Request->file('file')->getClientMimeType();
                $file->new_name = $fileName;
                $file->IPuser = $ip;
                if (Auth::check()) $file->user_id = Auth::id();
                if ($file->save()) {
                    return Response::make('uploaded', 200);
                }
                return Response::json('2error:' . $Request->file('file')->getClientMimeType() . ' ' . $Request->file('file')->getClientSize(), 400);
            }
            return Response::json('1error:' . $Request->file('file')->getClientMimeType() . ' ' . $Request->file('file')->getClientSize(), 400);

        }
        return Response::json($validation->errors()->all(), 400);
    }

    public function downloadFiles($id)
    {

        $db_file = DB::table('files')->where('id', $id)->get()->toarray();
        if (count($db_file) > 0)
            return view('download', ['id' => $db_file[0]->id, 'name' => $db_file[0]->name]);
        return view('errors.404');

    }

    public function createLink(Request $request, $id)
    {
        $ip = $request->getClientIp();
        if ($id != $request->get('id')) return url('link/filed');
        $user = Auth::id();
        $token = md5($ip . $id . $user);
        $downloads = new Downloads;
        $downloads->ip = $ip;
        $downloads->file_id = $id;
        $downloads->user_id = $user;
        $downloads->token = $token;
        $downloads->save();
        return "<a class=\"button\" href=\"" . url('download/' . $id . '/' . $token) . "\">Download</a>" .
            "<p style=\"color:#000;\">این لینک تولید شده فقط برای ای پی " . $ip . "به مدت دو روز معتبر میباشد.</p>";
    }

    public function download($id, $token)
    {
        $dowmload_row = Downloads::where("token", $token)->first()->File()->get();
	//        return $dowmload_row;
        $current_data = new DateTime(date('Y-m-d'));
	$towDay = new DateTime('0000-01-02');
        $ip = \Request::getClientIp();
        $downloadsDB = DB::table('downloads')
            ->where('file_id', $id)
            ->where('created_at', '>', $current_data->diff($towDay)->format('%Y-%m-%d 00:00:00'))
            ->where('ip', $ip)
            ->where('token', $token)->get();
        $fileDB = DB::table('files')->where('id', $id)->get()->toarray();
        if ( count($downloadsDB) > 0 && count($fileDB) > 0) {
            $fileDB = $fileDB[0];
            $url = 'uploads/' . $fileDB->new_name;
            if (file_exists($url)) {
                $headers = array(
                    "Content-Type: " . $fileDB->mime_type,
                    "Content-Length: " . filesize($url)
                );
                return Response::download($url, $fileDB->name, $headers);
            }
        }
        dd($downloadsDB,count($fileDB),$towDay->diff($current_data)->format('%Y-%m-%d 00:00:00'), $current_data->diff($towDay)->format('%Y-%m-%d 00:00:00'),$current_data);
        return view('errors.404');
    }
}
