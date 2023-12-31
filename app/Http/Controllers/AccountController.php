<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\AnnouncementContactMail;
use App\Actions\Fortify\UpdateUserPassword;

class AccountController extends Controller
{
    public function settings() {
        return view('auth.setting-password');
    }

    public function settingStore(Request $request) {

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Verifica che la vecchia password sia corretta
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->with(['alert' => __('ui.oldPasswordIncorrect')]);
        }

        // Aggiornamento della password
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with(['success' => __('ui.passwordUpdated')]);
    }


    public function sendEmail(Request $request)
    {
        $request->validate([
            'announcement_id' => 'required|integer',
            'email' => 'required|email',
            'name' => 'required|string',
            'message' => 'required|string'
        ]);
    
        $announcement = Announcement::findOrFail($request->announcement_id);
        $user = $announcement->user;
    
        // Invia l'email
        Mail::to($user->email)->send(new AnnouncementContactMail($request->email, $request->name, $request->message));
    
        return back()->with('success', __('ui.emailSent'));
    }

    public function index()
    {
        $user = Auth::user();
        $announcements = $user->announcements;

        return view('user.index', ['announcements' => $announcements]);
    }

    public function favorites()
    {
        $user = Auth::user();
        $favoriteAnnouncements = $user->getFavoriteItems(Announcement::class)->get();

        return view('user.favorites', ['favoriteAnnouncements' => $favoriteAnnouncements]);
    }

    public function favoritesStore($announcement_id)
    {
        $announcement = Announcement::find($announcement_id);
    
        // Controlla se l'annuncio esiste
        if (!$announcement) {
            return redirect()->back()->with('alert', __('ui.announcementNotFound'));
        }
    
        // Aggiungi o rimuovi dai preferiti
        $user = auth()->user();
        if ($user->hasFavorited($announcement)) {
            $user->unfavorite($announcement);
        } else {
            $user->favorite($announcement);
        }
    
        return redirect()->back()->with('success', __('ui.favoriteUpdated'));
    }
}
