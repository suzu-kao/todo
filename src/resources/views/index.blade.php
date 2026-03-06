@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', 'Todo')



{{-- エラーメッセージ --}}
@error('content')
<div class="error">
    {{ $message }}
</div>
@enderror


@section('content')
<div class="form--container">
    <form class="create_form" action="/todos" method="post">
        @csrf
        <div class="create--form_input">
            <input type="text" name="content" class="creat--form_item">
        </div>
        <div class="create--form_btn">
            <button class="create_btn" type="submit">作成</button>
        </div>
    </form>

    <h2>Todo</h2>
    <table class="todo--table">
        @foreach ($todos as $todo)
        <tr class="todo--table_row">
            <td class="todo--table_td">
                <form action="/todos/update" method="post" class="update--form">
                    @csrf
                    @method('PATCH')
                    <!-- 編集欄 -->
                    <div>
                        <input type="text" name="content" value="{{ $todo->content }}" class="update--form_input">
                        <input type="hidden" name="id" value="{{ $todo['id'] }}">
                    </div>
                    <!-- 更新ボタン -->
                    <div>
                        <button type="submit" class="update--form_button">更新</button>
                    </div>
                </form>
            </td>
            <!-- <td class="todo--table_td todo--table_actions">

                </td> -->
            <!-- 削除ボタン -->
            <form action="/todos/delete" method="post" class="delete--form">
                @csrf
                @method('DELETE')
                <button type="submit" name="id" value="{{ $todo['id'] }}"
                    class="delete--form_btn">削除</button>
            </form>
        </tr>
    </table>
    @endforeach

    @endsection