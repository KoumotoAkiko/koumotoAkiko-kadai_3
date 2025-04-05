@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/update.css') }}">
@endsection


@section('content')

<div class="update">
        <div class="update-inner">
            <div class="update__heading">
                <h2 class="update__heading content__heading">目標体重設定</h2>
            </div>
                <form class="update-form" action="{{route('weight_target.update',$target->id)}}" method="post">
                @csrf
                @method('PUT')
                <input class="update-form__input" type="number" step="0.1" min="0" max="9999.9" id="target_weight" name="target_weight" value="{{ old($target->target_weight) }}"><span>kg</span>

                <p class="error-message">
                        @error('target_weight')
                        {{$message}}
                        @enderror
                </p>

                <div class="update-form__actions">
                    <button type="button" class="update-form__back-btn" onclick="location.href='{{route('weight_logs.admin')}}'">戻る</button>
                    <button type="submit" class="button-change">更新</button>
                </div>
            </form>
        </div>
</div>


@endsection