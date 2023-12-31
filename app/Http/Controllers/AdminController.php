<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index () {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function deleteUser(User $user) {
        $user->delete();
        return redirect()->route('admin.index')->with(['success' => __('ui.userDeleted')]); 
    }

    public function changeRole(Request $request, User $user) {
        $user->role = $request->role;
        $user->save();
    
        return redirect()->route('admin.index')->with(['success' => __('ui.roleEdited')]);
    }

    public function menageAnnouncements (User $user) {
        $announcements = $user->announcements;
        return view('admin.menageAnnouncement', compact('announcements','user'));
    }
}
