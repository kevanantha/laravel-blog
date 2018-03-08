<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;
use Mail;
use App\Post;
use Session;

class PagesController extends Controller {

    public function getIndex() {
      $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
      return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout() {
        $first = "Kevin";
        $last = "Anantha";
        $fullname = $first . " " . $last;

        return view('pages.about')->withFullname($fullname);
    }

    public function getContact() {
        return view('pages.contact');
    }

    public function postContact(Request $request) {
      $this->validate($request, array(
        'email' => 'required|email',
        'subject' => 'min:3',
        'message' => 'min:10'
      ));

      $data = array(
        'email' => $request->email,
        'subject' => $request->subject,
        'bodyMessage' => $request->message
      );

      Mail::send('emails.contact', $data, function($bodyMessage) use ($data) {
        $bodyMessage->from($data['email']);
        $bodyMessage->to('hello@kananthav.xyz');
        $bodyMessage->subject($data['subject']);
      });

      Session::flash('success', 'Your email was sent!');

      return redirect('/contact');
    }

}