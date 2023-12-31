<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\User;
use App\Mail\BecomeRevisor;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;



class RevisorController extends Controller
{
    public function index () {

        if(Auth::user()->role == 'admin') {
            $announcements_toRevise = Announcement::where('revised', null)->get();
        } else{
            $announcements_toRevise = Announcement::where('revised', null)->where('user_id', '!=', Auth::id())->get();
        }
        return view('revisor.index', compact('announcements_toRevise'));
    }

    public function acceptAnnouncement (Announcement $announcement) {
        $announcement->setAccepted(true);
        return redirect()->back()->with('success', __('ui.acceptedAnnouncement'));
    }

    public function rejectAnnouncement (Announcement $announcement) {
        $announcement->setAccepted(false);
        return redirect()->back()->with('alert', __('ui.rejectedAnnouncement'));
    }

    public function becomeRevisor (Request $request) {
        $description = $request->input('description');
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user(), $description));
        return redirect()->back()->with('success', __('ui.requestSent'));
    }

    public function makeRevisor (User $user) {
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect('/')->with('success', __('ui.userRevisor'));
    }
}
