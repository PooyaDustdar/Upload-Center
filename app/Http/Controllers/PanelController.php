<?php
namespace App\Http\Controllers;
use App\Statistics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
class PanelController extends Controller {
    public function __construct(Request $request){
        $this->middleware('index')->only('index');
        $this->middleware('admin')->only('admin');
        $this->middleware('user')->only('user');
        $this->ip();
    }
    public function index() {}
    public function admin() {
        $count['file']=DB::table('files')->selectRaw('Count(*) as count')->get()->toarray();
        $count['file']=(count($count['file'])>0)?$count['file'][0]->count:0;
        $count['user']=DB::table('users')->selectRaw('Count(*) as count')->where('type','user')->get()->toarray();
        $count['user']=(count($count['user'])>0)?$count['user'][0]->count:0;
        $statistics=$this->statistics();
        $files=DB::table('files')->orderBy('created_at')->limit(8)->get()->toarray();
        foreach($files as $key=>$value)
            $value->mime_type = $this->fileTypeFontAwesome($value->mime_type);
        $array_data=[
            'count'=>$count,
            'statistics'=>$statistics,
            'files'=>$files,
        ];
        return view('admin.index',$array_data);
    }
    public function user(){
        return view('admin.index_user');
    }
    protected function ip(){
        $current_data=new DateTime(date('Y-m-d'));
        $ip=\Request::ip();
        $table_statistics=DB::table('statistics')->where('ip',$ip)
            ->where('created_at', '>=', $current_data->format('Y-m-d 00:00:00'))
            ->where('created_at', '<=', $current_data->format('Y-m-d 23:59:59'))->get()->toarray();
        if(count($table_statistics) <= 0){
            Statistics::create(['ip'=>\Request::ip()]);
        }
    }
    protected function statistics(){
        $current_data=new DateTime(date('Y-m-d'));
        $statistics['upload']['today']=DB::table('files')
            ->selectRaw('Count(*) as count')
            ->where('created_at', '>=', $current_data->format('Y-m-d 00:00:00'))
            ->where('created_at', '<=', $current_data->format('Y-m-d 23:59:59'))
            ->get()->toarray();
        $statistics['upload']['today']=(count($statistics['upload']['today'])>0)?$statistics['upload']['today'][0]->count:0;
        $statistics['upload']['toweek']=DB::table('files')
            ->selectRaw('Count(*) as count')
            ->where('created_at', '<=', $current_data->format('Y-m-d 23:59:59'))
            ->where('created_at', '>=', $current_data->diff(new DateTime('0000-00-7'))->format('%Y-%m-%d 00:00:00'))
            ->get()
            ->toarray();
        $statistics['upload']['toweek']=(count($statistics['upload']['toweek'])>0)?$statistics['upload']['toweek'][0]->count:0;
        $statistics['upload']['tomonth']=DB::table('files')
            ->selectRaw('Count(*) as count')
            ->where('created_at', '<=', $current_data->format('Y-m-d 23:59:59'))
            ->where('created_at', '>=', $current_data->diff(new DateTime('0000-01-00'))->format('%Y-%m-%d 00:00:00'))
            ->get()->toarray();
        $statistics['upload']['tomonth']=(count($statistics['upload']['tomonth'])>0)?$statistics['upload']['tomonth'][0]->count:0;

        //download
        $statistics['download']['today']=DB::table('downloads')
            ->selectRaw('Count(*) as count')
            ->where('created_at', '>=', $current_data->format('Y-m-d 00:00:00'))
            ->where('created_at', '<=', $current_data->format('Y-m-d 23:59:59'))
            ->get()->toarray();
        $statistics['download']['today']=(count($statistics['download']['today'])>0)?$statistics['download']['today'][0]->count:0;
        $statistics['download']['toweek']=DB::table('downloads')
            ->selectRaw('Count(*) as count')
            ->where('created_at', '<=', $current_data->format('Y-m-d 23:59:59'))
            ->where('created_at', '>=', $current_data->diff(new DateTime('0000-00-7'))->format('%Y-%m-%d 00:00:00'))
            ->get()
            ->toarray();
        $statistics['download']['toweek']=(count($statistics['download']['toweek'])>0)?$statistics['download']['toweek'][0]->count:0;
        $statistics['download']['tomonth']=DB::table('downloads')
            ->selectRaw('Count(*) as count')
            ->where('created_at', '<=', $current_data->format('Y-m-d 23:59:59'))
            ->where('created_at', '>=', $current_data->diff(new DateTime('0000-01-00'))->format('%Y-%m-%d 00:00:00'))
            ->get()->toarray();
        $statistics['download']['tomonth']=(count($statistics['download']['tomonth'])>0)?$statistics['download']['tomonth'][0]->count:0;

        //statistics
        $statistics['today']=DB::table('statistics')
            ->selectRaw('Count(*) as count')
            ->where('created_at', '>=', $current_data->format('Y-m-d 00:00:00'))
            ->where('created_at', '<=', $current_data->format('Y-m-d 23:59:59'))
            ->get()->toarray();
        $statistics['today']=(count($statistics['today'])>0)?$statistics['today'][0]->count:0;
        $statistics['toweek']=DB::table('statistics')
            ->selectRaw('Count(*) as count')
            ->where('created_at', '<=', $current_data->format('Y-m-d 23:59:59'))
            ->where('created_at', '>=', $current_data->diff(new DateTime('0000-00-7'))->format('%Y-%m-%d 00:00:00'))
            ->get()
            ->toarray();
        $statistics['toweek']=(count($statistics['toweek'])>0)?$statistics['toweek'][0]->count:0;
        $statistics['tomonth']=DB::table('statistics')
            ->selectRaw('Count(*) as count')
            ->where('created_at', '<=', $current_data->format('Y-m-d 23:59:59'))
            ->where('created_at', '>=', $current_data->diff(new DateTime('0000-01-00'))->format('%Y-%m-%d 00:00:00'))
            ->get()->toarray();
        $statistics['tomonth']=(count($statistics['tomonth'])>0)?$statistics['tomonth'][0]->count:0;
        return $statistics;
    }
}
