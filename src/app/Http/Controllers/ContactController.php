<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();
        return view('index', compact('contacts', 'categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'category_id', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'detail']);

        $contact['gender_text'] = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ][$contact['gender']] ?? '';

        $categories = Category::all();

        return view('confirm', compact('contact', 'categories'));
    }


    public function store(ContactRequest $request)
    {

        $contact = $request->only(['first_name', 'last_name', 'category_id', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'detail']);

        Contact::create($contact);

        return view('thanks');
    }

    public function edit(Request $request)
    {
        $contact = $request->all();

        $categories = Category::all();

        return view('index', compact('contact', 'categories'));
    }
}
