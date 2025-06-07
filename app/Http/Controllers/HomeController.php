<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function about()
    {
        return view('about');
    }
    public function services()
    {
        return view('services');
    }
    public function guide_patient()
    {
        return view('guide_patient');
    }
    public function blog()
    {
        return view('blog');
    }
    public function contact()
    {
        return view('contact');
    }
    public function events()
    {
        return view('events');
    }
    public function medecins()
    {
        return view('medecins');
    }
    public function pharmacie()
    {
        return view('pharmacie');
    }
    public function prise_rdv()
    {
        return view('prise_rdv');
    }
    public function blog_details()
    {
        return view('blog_details');
    }
    public function chat()
    {
        return view('chat');
    }
    public function product_details()
    {
        return view('product_details');
    }


}
