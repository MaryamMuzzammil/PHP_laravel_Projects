<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(){
        return view('layout.index');
    }
    public function show_event(){
        return view('layout.event');
    }
    public function show_contact(){
        return view('layout.contact');
    }
    public function show_blogs(){
        return view('layout.blogs');
    }
    public function show_about(){
        return view('layout.about');
    }
    public function show_activity(){
        return view('layout.activity');
    }
    public function show_sermons(){
        return view('layout.sermons');
    }
    public function show_team(){
        return view('layout.team');
    }
    public function show_testimonial(){
        return view('layout.testimonial');
    }
}
