@extends('layouts.add')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__alert">
    @if( session('message'))
    <div class="todo__alert--success">
        {{ session('message') }}
    </div>
    @endif
    @if( $errors->any())
    <div class="todo__alert--danger">
        <ul>
            @foreach( $errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<div class="todo__content">
    <div class="todo__section-ttl">
        <h2>新規作成</h2>
    </div>
    <form action="/todos" method="post" class="create-form">
        @csrf
        <div class="create-form__item">
            <input type="text" name="content" value="{{ old('content') }}" class="create-form__item-input">
            <select name="category_id" class="create-form__item-select">
                <option value="">カテゴリ</option>
                @foreach( $categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="create-form__button">
            <button class="create-form__button-submit">作成</button>
        </div>
    </form>
    <div class="todo__section-ttl">
        <h2>Todo検策</h2>
    </div>
    <form action="/todos/search" method="get" class="search-form">
        @csrf
        <div class="search-form__item">
            <input type="text" name="keyword" value="{{ old('keyword') }}" class="search-form__item-input">
            <select name="category_id" class="search-form__item-select">
                <option value="">カテゴリ</option>
                @foreach( $categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="search-form__button">
            <button class="search-form__button-submit">検索</button>
        </div>
    </form>
    <div class="todo-table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                <th class="todo-table__header" colspan="2">
                    <div class="todo-table__header-item">
                        <span>Todo</span>
                        <span>カテゴリ</span>
                    </div>
                </th>
            </tr>
            @foreach($todos as $todo)
            <tr class="todo-table__row">
                <td class="todo-table__content">
                    <form action="/todos/update" method="post" class="update-form">
                        @method('patch')
                        @csrf
                        <div class="update-form__item">
                            <input type="text" value="{{ $todo->content }}" name="content"  value="{{ old('content') }}" class="update-form__item-input">
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                        </div>
                        <div class="update-form__item">
                            <p class="update-form__item-p">{{ $todo->category->name}}</p>
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="todo-table__content">
                    <form action="/todos/delete" method="post" class="delete-form">
                        @method('delete')
                        @csrf
                        <div class="delete-form__button">
                            <button class="delete-form__button-submit">削除</button>
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection