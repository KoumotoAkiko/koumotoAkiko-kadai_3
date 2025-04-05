@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection


@section('content')
<div class="edit-form">
    <div class="edit-form__heading content__heading">
        <h2 class="edit-form__heading">WeightLog</h2>
    </div>
    <div class="edit-form__inner">
        <form action="{{route('weight_logs.update' ,$weightLog->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="edit-form__group">
                <label class="edit-form__label">日付</label>
                <input class="edit-form__input" type="date" id="date" name="date" value="{{$weightLog->date}}" >
                    <p class="error-message">
                        @error('date')
                        {{$message}}
                        @enderror
                    </p>
            </div>
            <div class="edit-form__group">
                <label class="edit-form__label">体重</label>
                <input class="edit-form__input" type="number" step="0.1" min="0" max="9999.9" id="weight" name="weight"  placeholder="{{$weightLog->weight}}"><span>kg</span>
                    <p class="error-message">
                        @error('weight')
                        {{$message}}
                        @enderror
                    </p>
            </div>
            <div class="edit-form__group">
                <label class="edit-form__label">摂取カロリー</label>
                <input class="edit-form__input" type="number" id="calories" name="calories" placeholder="{{$weightLog->calories}}"><span>cal</span>
                    <p class="error-message">
                        @error('calories')
                        {{$message}}
                        @enderror
                    </p>
            </div>
            <div class="edit-form__group">
                <label class="edit-form__label">運動時間</label>
                <input class="edit-form__input" type="time" id="exercise_time" name="exercise_time" value="{{$weightLog->exercise_time}}">
                    <p class="error-message">
                        @error('exercise_time')
                        {{$message}}
                        @enderror
                    </p>
            </div>
            <div class="edit-form__group">
                <label class="edit-form__label">運動内容</label>
                <textarea id="exercise_content" name="exercise_content" cols="20" rows="6" class="edit-exercise_content">{{$weightLog->exercise_content}}</textarea>
                @error('exercise_content')
               <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <div class="edit-form__actions">
                <a href="{{route('weight_logs.admin')}}" class="edit-form__back-btn">戻る</a>
                <button type="submit" class="change-button">更新</button>
                    <div class="trashbox-content">
        </form>
            <div class="edit-form__actions"></div>
                <form class="trashbox-content__delete" action="{{route('weight_logs.destroy',$weightLog->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="trashbox-content__delete__btn">
                        <input type="hidden" name="id" value="{{$weightLog['id']}}">
                            <button class="delete__btn btn">
                                <img src="{{asset('/images/trashbox.svg')}}" alt="ゴミ箱" class="trashbox-icon">
                            </button>
                    </div>
                </form>
            </div>
    </div>
</div>
@endsection