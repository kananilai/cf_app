<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wod;
use App\Models\Record;
use App\Models\Weight;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $wods = Wod::where('status',1)->orderBy('date', 'DESC')->get();
        return view('top',compact('wods'));
    }
    public function adminCreate()
    {
        //ログイン中のユーザー情報取得
        $user = \Auth::user();

        return view('create',compact('user'));
    }

    public function adminStore(Request $request)
    {
        $data=$request->all();
        // DBに入れる
        $wod_id = Wod::insertGetId([
            'date' => $data['date'],
            'title' => $data['title'],
            'content' => $data['content'],
            'status' => 1
        ]);

        return redirect('top');
    }

    public function showWod($id)
    {
        $wod = Wod::where('id', $id)->first();
        $records = Record::where('wod_id',$id)->orderBy('created_at', 'DESC')->get();
        //ログイン中のユーザー情報取得
        $user = \Auth::User()->getAttributes();
        return view('showWod', compact('wod','records','user',));
    }

    public function storeRecord(Request $request, $id)
    {
        $this->validate($request, Record::$rules);
        $wod = Wod::where('id', $id)->first();
        $wods = Wod::where('status',1)->orderBy('date', 'DESC')->get();
        $data=$request->all();
        //ログイン中のユーザー情報取得
        $user = \Auth::user();
        $record = Record::insertGetId([
            'user_id'=>$data['user_id'],
            'wod_id'=>$data['wod_id'],
            'name'=>$data['name'],
            'score'=>$data['score'],
            'comment'=>$data['comment'],
            'feeling'=>$data['feeling'],
        ]);
        $records = Record::where('wod_id',$id)->orderBy('created_at', 'DESC')->get();
        return view('showWod', compact('wod','records','user'));
    }

    public function storeWeight(Request $request,$id)
    {
        $this->validate($request, Weight::$rules);
        $data=$request->all();
        //ログイン中のユーザー情報取得
        $user = \Auth::user();
        $weight = Weight::insertGetId([
            'user_id'=>$data['user_id'],
            'date'=>$data['date'],
            'weight_id'=>$data['weight'],
            'set'=>$data['set'],
            'weight'=>$data['kg'],
            'rep'=>$data['rep'],
        ]);

        $squats = Weight::where('weight_id', 1)->where('user_id',$id)->orderBy('date', 'DESC')->get();
        $deadlifts = Weight::where('weight_id', 2)->where('user_id',$id)->orderBy('date', 'DESC')->get();
        $snatches = Weight::where('weight_id', 3)->where('user_id',$id)->orderBy('date', 'DESC')->get();
        $cleans = Weight::where('weight_id', 4)->where('user_id',$id)->orderBy('date', 'DESC')->get();
        $records = Record::where('user_id',$id)->orderBy('created_at', 'DESC')->get();
        return view('mypage',compact('user','weight','squats','deadlifts','snatches','cleans','records'));
    }

    public function mypage($id){
        //ログイン中のユーザー情報取得
        $user = \Auth::user();
        $squats = Weight::where('weight_id', 1)->where('user_id',$id)->orderBy('date', 'DESC')->get();
        $deadlifts = Weight::where('weight_id', 2)->where('user_id',$id)->orderBy('date', 'DESC')->get();
        $snatches = Weight::where('weight_id', 3)->where('user_id',$id)->orderBy('date', 'DESC')->get();
        $cleans = Weight::where('weight_id', 4)->where('user_id',$id)->orderBy('date', 'DESC')->get();

        $records = Record::where('user_id',$id)->orderBy('created_at', 'DESC')->get();
        return view('mypage',compact('user','squats','records','deadlifts','snatches','cleans'));
    }

    public function delete($id,$weightId)
    {
        //ログイン中のユーザー情報取得
        $user = \Auth::user();
        // $user_id =  \Auth::user()->id;
        // $squats = Weight::where('weight_id', 1)->where('user_id',$id)->orderBy('date', 'DESC')->get();
        // $deadlifts = Weight::where('weight_id', 2)->where('user_id',$id)->orderBy('date', 'DESC')->get();
        // $snatches = Weight::where('weight_id', 3)->where('user_id',$id)->orderBy('date', 'DESC')->get();
        // $cleans = Weight::where('weight_id', 4)->where('user_id',$id)->orderBy('date', 'DESC')->get();
        // $records = Record::where('user_id',$id)->orderBy('created_at', 'DESC')->get();

        $weight= Weight::where('weight_id', $id)->where('id', $weightId)->delete();
        return redirect()->route('mypage',['id' =>$user['id']]);
}

}
