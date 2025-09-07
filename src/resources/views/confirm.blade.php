@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
    <div class="confirm__content">
        <div class="confirm__heading">
            <h2>confirm</h2>
        </div>
        <form class="confirm-form" action="/contacts/store" method="post">
            @csrf
            <div class="confirm-table">
                <table class="confirm-table__inner">
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お名前</th>
                        <td class="confirm-table__text">
                            <p>{{ $contact['first_name'] }} {{ $contact['last_name'] }}</p>
                            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
                            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
                        </td>
                    </tr>

                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">性別</th>
                        <td class="confirm-table__text">
                            <p>{{ $contact['gender_text'] }}</p>
                            <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">メールアドレス</th>
                        <td class="confirm-table__text">
                            <p>{{ $contact['email'] }}</p>
                            <input type="hidden" name="email" value="{{ $contact['email'] }}" />
                        </td>
                    </tr>

                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">電話番号</th>
                        <td class="confirm-table__text">
                            <p>{{ $contact['tel1'] }}-{{ $contact['tel2'] }}-{{ $contact['tel3'] }}</p>
                            <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}" />
                            <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}" />
                            <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}" />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">住所</th>
                        <td class="confirm-table__text">
                            <p>{{ $contact['address'] }}</p>
                            <input type="hidden" name="address" value="{{ $contact['address'] }}" />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">建物名</th>
                        <td class="confirm-table__text">
                            <p>{{ $contact['building'] }}</p>
                            <input type="hidden" name="building" value="{{ $contact['building'] }}" />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせの種類</th>
                        <td class="confirm-table__text">
                            <p>{{ $categories->find($contact['category_id'])->content }}</p>
                            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせ内容</th>
                        <td class="confirm-table__text">
                            <p>{{ $contact['detail'] }}</p>
                            <input type="hidden" name="detail" value="{{ $contact['detail'] }}" readonly />
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">送信</button>
            </div>
        </form>
        <form class="edit-form" action="/contacts/edit" method="post">
            @csrf
            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
            <input type="hidden" name="email" value="{{ $contact['email'] }}" />
            <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}" />
            <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}" />
            <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}" />
            <input type="hidden" name="address" value="{{ $contact['address'] }}" />
            <input type="hidden" name="building" value="{{ $contact['building'] }}" />
            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" />
            <input type="hidden" name="detail" value="{{ $contact['detail'] }}" />
            <div class="form__button">
                <button class="edit__button-submit" type="submit">修正</button>
            </div>
        </form>
    </div>
@endsection
