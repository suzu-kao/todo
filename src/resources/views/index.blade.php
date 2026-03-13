@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', 'Todo')




<!-- {{-- エラーメッセージ --}} -->
@error('content')
<div class="error__container">
    <div class="error">
        {{ $message }}
    </div>
</div>
@enderror

@section('content')

<div class="form--container">
    <h2>新規作成</h2>
    <form class="create_form form" action="/todos" method="post">
        @csrf
        <div class="create--form_input form_input">
            <input type="text" name="content" class="create--form_item" value="{{ old('content') }}">
        </div>
        <div class="create--form_select form_select">
            <select name="category_id" id="category_id">
                <option value="" selected>カテゴリ</option>

                @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach

            </select>
        </div>
        <div class="create--form_btn form_btn">
            <button class="submit_btn" type="submit">作成</button>
        </div>
    </form>

    <h2>Todo検索</h2>
    <form class="search--form form" action="" method="post">
        @csrf
        <div class="search--form_input form_input">
            <input type="text" name="content" class="creat--form_item">
        </div>
        <div class="search--form_select form_select">
            <select name="" id="">
                <option value="" selected>カテゴリ</option>

                @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
                @endforeach

            </select>
        </div>
        <div class="search--form_btn form_btn">
            <button class="submit_btn" type="submit">検索</button>
        </div>
    </form>

    <!-- todoテーブル -->
    <table class="todo--table">
        <tr>
            <th class="todo--table_header">
                <h2 class="todo--table_header-title">Todo</h2>
                <h2 class="todo--table__header-title">カテゴリ</h2>
                <div class="todo--table_space"></div>
            </th>
        </tr>
        @foreach ($todos as $todo)
        <tr class="todo--table_row table_row">
            <td class="todo--table_td table_td">
                <form action="/todos/update" method="post" class="update--form">
                    @method('PATCH')
                    @csrf
                    <!-- 編集欄 -->
                    <div>
                        <input type="text" name="content" value="{{ $todo->content }}" class="update--form_input">
                        <input type="hidden" name="id" value="{{ $todo['id'] }}">
                    </div>
                    <!-- カテゴリ -->
                    <div>
                        {{ $todo->category->name }}
                        <!-- <input type="text" name="content" value="{{ $category->name }}" class="update--form_input">
                        <input type="hidden" name="id" value="{{ $category['id'] }}"> -->
                    </div>
                    <!-- 更新ボタン -->
                    <div>
                        <button type="submit" class="update--form_btn">更新</button>
                    </div>
                </form>
            </td>
            <!-- 削除ボタン -->
            <td class="todo--table_td">
                <form action="/todos/delete" method="post" class="delete--form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" name="id" value="{{ $todo['id'] }}"
                        class="delete--form_btn">削除
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    @endsection