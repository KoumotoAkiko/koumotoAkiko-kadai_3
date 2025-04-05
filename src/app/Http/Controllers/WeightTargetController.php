<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WeightTargetRequest;
use App\Models\User;
use App\Models\WeightTarget;
use App\Models\WeightLog;


class WeightTargetController extends Controller
{
     public function target()
    {
        return view('target');
    }

    public function store(WeightTargetRequest $request)
    {
        WeightTarget::create([
            'user_id'=>Auth::id(),
            'target_weight'=>$request->target_weight,
        ]);
        return redirect()->route('weight_logs.admin');
    }

    public function edit(){
        $user=Auth::user();
        $target=WeightTarget::where('user_id',$user->id)->first();
        return view('update',compact('target'));
    }

    public function update(WeightTargetRequest $request,$id)
    {
        $target=WeightTarget::where('user_id',Auth::id())->findOrFail($id);
        $target->target_weight=$request->target_weight;
        $target->save();

        return redirect()->route('weight_logs.admin');

}
}
