<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function showHome() {

        $userId = Auth::id();

        $announcements = Announcement::where('revised', true)->when($userId, function ($query) use ($userId) {
            return $query->where('user_id', '!=', $userId);
        })->latest()->take(6)->get();

        return view('home', compact('announcements'));

    }

    public function showCategory(Category $category) {

        $announcements = $category->announcements()->where('revised', true)->orderBy('created_at', 'desc')->paginate(9);

        return view('categoryShow', compact('category', 'announcements'));

    }

    public function showWorkUs() {

        return view('workUs');

    }

    public function searchAnnouncements(Request $request) {
        $query = $request->searched;
        $announcements = Announcement::search($query)->where('revised', true)->paginate(9);
        
    
        return view('announcements.search', compact('announcements', 'query'));
    }
    

    public function setLanguage($lang) {

        session()->put('locale', $lang);

        $country = $this->getCountryFromLanguage($lang);
        session()->put('country', $country);

        return redirect()->back();
    }

    protected function getCountryFromLanguage($lang) {
        $langToCountry = [
            'it' => 'it',
            'en' => 'us',
            'fr' => 'fr'
        ];
    
        return $langToCountry[$lang] ?? 'it';
    }
}
