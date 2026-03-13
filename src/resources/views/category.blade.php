@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('title', 'Todo')



<!-- {{-- エラーメッセージ --}} -->
@error('name')
<div class="error__container">
    <div class="error">
        {{ $message }}
    </div>
</div>
@enderror

@section('content')
<div class="category--container">
    <form class="category--create_form form" action="/category" method="post">
        @csrf
        <div class="category--create_form-input form_input">
            <input type="text" name="name" class="category--create_form-item" value="{{ old('name') }}">
        </div>
        <div class="category--create_form_btn form_btn">
            <button class="submit_btn" type="submit">作成</button>
        </div>
    </form>


    <!-- categoryテーブル -->
    <table class="category--table">
        <tr>
            <th class="category--table_header">
                <h2 class="category--table_header-title">Category</h2>
            </th>
        </tr>
        @foreach ($categories as $category)
        <tr class="category--table_row table_row">
            <td class="category--table_td table_td">
                <form action="/category/update" method="post" class="update--form">
                    @method('PATCH')
                    @csrf
                    <!-- 編集欄 -->
                    <div>
                        <input type="text" name="name" value="{{ $category->name }}" class="update--form_input">
                        <input type="hidden" name="id" value="{{ $category['id'] }}">
                    </div>

                    <!-- 更新ボタン -->
                    <div>
                        <button type="submit" class="update--form_btn">更新</button>
                    </div>
                </form>
            </td>
            <!-- 削除ボタン -->
            <td class="category--table_td table_td">
                <form action="/category/delete" method="post" class="delete--form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" name="id" value="{{ $category['id'] }}"
                        class="delete--form_btn">削除
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    @endsection