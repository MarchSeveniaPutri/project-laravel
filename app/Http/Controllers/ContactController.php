<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
        $contacts = contact::first();
        return view('layouts.public.contact', compact('contacts'));
    }
}
