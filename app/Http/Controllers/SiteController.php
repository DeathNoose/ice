<?php
// app/Http/Controllers/SiteController.php
namespace App\Http\Controllers;

use App\Models\Skate;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $skates = Skate::where('is_available', true)
            ->where('quantity', '>', 0)
            ->limit(4)
            ->get();
        
        return view('home', compact('skates'));
    }

    public function about()
    {
        return view('site.about');
    }

    public function schedule()
    {
        return view('site.schedule');
    }

    public function contacts()
    {
        return view('site.contacts');
    }
}