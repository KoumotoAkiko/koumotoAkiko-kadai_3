<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WeightLogRequest;
use App\Models\User;
use App\Models\WeightTarget;
use App\Models\WeightLog;

class WeightLogController extends Controller
{
    public function admin()
    {

        $user=Auth::user(); //現在ログインのデータ取得

        $target=WeightTarget::where('user_id',$user->id)->first();//ユーザーの目標体重を取得

        $latestLog=WeightLog::where('user_id',$user->id)->orderBy('date','desc')->first();//ユーザーの最新体重取得

        $logs=WeightLog::where('user_id',$user->id)->orderBy('date','desc')->paginate(8);
    

         return view('admin',compact('target','latestLog','logs'));
    }

    public function store(WeightLogRequest $request){
        WeightLog::create(array_merge(
            $request->validated(),
            ['user_id'=>auth()->id()]
        ));

        return redirect()->route('weight_logs.admin');
    }


    public function edit($weightLogid){
        $weightLog=WeightLog::where('user_id',Auth::id())->findOrFail($weightLogid);

        return view('edit',compact('weightLog'));

    }

    public function update(WeightLogRequest $request,$weightLogid){

        $weightLog=WeightLog::where('user_id',Auth::id())->findOrFail($weightLogid);
        $weightLog->update($request->validated());

        return redirect()->route('weight_logs.admin');
    }

    public function destroy($weightLogid){
        $weightLog=WeightLog::where('user_id',Auth::id())->findOrFail($weightLogid);
        $weightLog->delete();

        return redirect()->route('weight_logs.admin');
    }

    public function search(Request $request)
    {
        $user=Auth::user(); //現在ログインのデータ取得

        $target=WeightTarget::where('user_id',$user->id)->first();//ユーザーの目標体重を取得

        $latestLog=WeightLog::where('user_id',$user->id)->orderBy('date','desc')->first();//ユーザーの最新体重取得

        $startDate=$request->input('start_date');
        $endDate=$request->input('end_date'); //フォームからの検索日付を取得

        $query=WeightLog::where('user_id',$user->id)->orderBy('date', 'asc');//クエリを作成して古い順に取得

        if($startDate && $endDate){
            $query->whereBetween('date',[$startDate,$endDate]);//日付範囲で検索
        }
    

        $logs=$query->paginate(8);//検索結果を取得

        return view('admin',compact('logs','target','latestLog','startDate','endDate'));

    }
}
