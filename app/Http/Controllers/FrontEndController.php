<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home() {
        return view('frontend.home.index');
    }
    public function contact() {
        return view('frontend.contact.index');
    }
    public function about() {
        return view('frontend.about.index');
    }
    public function vegetables() {
        return view('frontend.shop.vegetable');
    }
    public function fruits() {
        return view('frontend.shop.fruit');
    }
}
