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
        $categories = Category::all();

        return view('confirm', compact('contact', 'categories'));
    }


    public function store(ContactRequest $request)
    {

        $contact = $request->only(['first_name', 'last_name', 'category_id', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'detail']);

        Contact::create($contact);

        return view('thanks');
    }
}
