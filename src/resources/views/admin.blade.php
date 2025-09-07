@extends('layouts.app')
<style>
    svg.w-5.h-5 {
        width: 30px;
        height: 30px;
    }
</style>
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
    <h2>Admin</h2>

    <!-- 検索フォーム -->
    <div class="search">
        <form class="search-form" action="/admin/search" method="get">
            <div class="search-form__item">

                <input class="search-form__item-keyword" type="text" name="keyword" value="{{ request('keyword') }}"
                    placeholder="名前やメールアドレスを入力してください">

                <select class="search-form__item-gender" name="gender">
                    <option value="">性別</option>
                    <option value="1" @if (request('gender') == 1) selected @endif>男性</option>
                    <option value="2" @if (request('gender') == 2) selected @endif>女性</option>
                    <option value="3" @if (request('gender') == 3) selected @endif>その他</option>
                </select>
                <select class="search-form__item-category" name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" @if (request('category_id') == $category->id) selected @endif>
                            {{ $category['content'] }}</option>
                    @endforeach
                </select>
                <input class="search-form__item-date" type="date" name="date" value="{{ request('date') }}">
                <button class="search-btn" type="submit">検索</button>
                <a class="reset-btn" href="/admin">リセット
                </a>
            </div>
        </form>
    </div>

    <div class="buttons">
        <div class="export-btn">
            <button class="export">エクスポート</button>
        </div>
        <div class="pagination">
            {{ $contacts->links() }}
        </div>
    </div>

    <div class="contacts">
        <table class="contacts__table">
            <tr class="table-heading">
                <th class="column">お名前</th>
                <th class="column">性別</th>
                <th class="column">メールアドレス</th>
                <th class="column">お問い合わせの種類</th>
            </tr>
            @foreach ($contacts as $contact)
                <tr class="table-data">
                    <td class="name">{{ $contact['last_name'] }} {{ $contact['first_name'] }}
                    </td>
                    <td class="gender">{{ $contact['gender_text'] }}</td>
                    <td class="email">{{ $contact['email'] }}</td>
                    <td class="category">{{ $contact['category_content'] }}</td>
                    <td class="detail">
                        <button class="detail-btn" wire:click="showModal" type="button">詳細</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
