@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection


@section('content')
        <div class="admin">
            <div class="admin__inner">
                <div class="admin__inner-row">
                    <div class="admin__card-cnt">
                        <div class="admin__card-block">
                            <h5>目標体重</h5>
                            <h2>{{$target->target_weight ?? '未設定'}} kg</h2>
                        </div>
                        <div class="admin__card-block">
                            <h5>目標まで</h5>
                            <h2>
                            @if($target && $latestLog)
                            <h2>-{{ $latestLog->weight - $target->target_weight}}kg</h2>
                            @endif
                            </h2>
                        </div>
                        <div class="admin__card-block">
                            <h5>最新体重</h5>
                            <h2>{{$latestLog->weight ?? '未登録'}} kg</h2>
                        </div>
                    </div>
                
                    <form class="search-form" action="{{route('weight_logs.search')}}" method="get">
                        @csrf
                        <input class="search-form__input" type="date" id="start_date" name="start_date" value="{{request('start_date')}}" placeholder="2025年11月21日">

                        <span>~</span>

                        <input class="search-form__input" type="date" id="end_date" name="end_date" value="{{request('end_date')}}" placeholder="2025年11月25日">
                        <button class="serach-form__serach-btn btn" type="submit">検索</button>

                        @if(!empty($startDate) && !empty($endDate))
                            <a href="{{ route('weight_logs.admin') }}" class="reset-btn">リセット</a>
                        @endif

                        @if (!empty($startDate) && !empty($endDate))
                            <p class="text-sm text-gray-600 mb-2">
                                {{ \Carbon\Carbon::parse($startDate)->format('Y年m月d日') }} 〜
                                {{ \Carbon\Carbon::parse($endDate)->format('Y年m月d日') }} の検索結果
                                {{ $logs->total() }}件
                            </p>
                        @endif
                    </form>
                    <label class="modal-btn" for="modal-toggle">データを追加</label>
                        <input class="modal-toggle" type="checkbox" id="modal-toggle" hidden>


                        <div class="modal">
                            <label for="modal-toggle" class="modal-overlay"></label> <!-- 背景クリックで閉じる -->
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title">WeightLogを追加</h2>
                                    </div>
                                    <div class="modal-from">
                                        <div class="modal-form__inner">
                                            <form class="modal-form__create" action="{{route('weight_logs.store')}}" method="post">
                                                @csrf
                                                <div class="modal-form__group">
                                                    <label class="modal-form__label" for="date">日付<span class="modal-form__required">必須</span></label>
                                                    <input  type="date" id="date" name="date" value="{{today()->format('Y-m-d')}}">
                                                        <p class="error-message">
                                                        @error('date')
                                                        {{$message}}
                                                        @enderror
                                                        </p>
                                                </div>
                                                <div class="modal-form__group">
                                                    <label class="modal-form__label" for="weight">体重<span class="modal-form__required">必須</span></label>
                                                    <input type="number" step="0.1" min="0" max="9999.9" id="weight" name="weight" ><span>kg</span>
                                                        <p class="error-message">
                                                        @error('weight')
                                                        {{$message}}
                                                        @enderror
                                                        </p>
                                                </div>
                                                <div class="modal-form__group">
                                                    <label class="modal-form__label" for="calories">摂取カロリー<span class="modal-form__required">必須</span></label>
                                                    <input type="number" id="calories" name="calories"><span>cal</span>
                                                        <p class="error-message">
                                                        @error('calories')
                                                        {{$message}}
                                                        @enderror
                                                        </p>
                                                </div>
                                                <div class="modal-form__group">
                                                    <label class="modal-form__label" for="exercise_time">運動時間<span class="modal-form__required">必須</span></label>
                                                    <input type="time" id="exercise_time" name="exercise_time" value="00:00">
                                                        <p class="error-message">
                                                        @error('exercise_time')
                                                        {{$message}}
                                                        @enderror
                                                        </p>
                                                </div>
                                                <div class="modal-form__group">
                                                    <label class="modal-form__label" for="exercise_content">運動内容</label>
                                                    <textarea id="exercise_content" name="exercise_content" rows="6" cols="20" placeholder="運動内容を記入"></textarea>
                                                </div>
                                                <div class="modal-form__actions">
                                                    <a href="{{route('weight_logs.admin')}}" class="modal-form__back-btn">戻る</a>
                                                    <button class="modal-form__btn btn" type="submit">登録</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            </div>
                        </div>

                    <table class="admin__table">
                        <tr class="admin__row">
                            <th class="admin__label">日付</th>
                            <th class="admin__label">体重(kg)</th>
                            <th class="admin__label">食事摂取カロリー(cal)</th>
                            <th class="admin__label">運動時間</th>
                            <th class="admin__label"></th>
                        </tr>

                        @foreach($logs as $log)
                        <tr class="admin__row">
                            <td class="admin__date">{{($log->date)}}</td>
                            <td class="admin__date">{{($log->weight)}} kg</td>
                            <td class="admin__date">{{($log->calories)}} cal</td>
                            <td class="admin__date">{{($log->exercise_time)}}</td>
                            <td class="admin__data">
                                <a href="{{route('weight_logs.edit',$log->id)}}" class="pencil-icom">
                                    <img src="{{asset('/images/pencil.svg')}}" alt="pen" class="pencil-icon__img">
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                        <div class="pagination-content">
                        {{$logs->links()}}
                        </div>
                </div>
            </div>
        </div>
@endsection
