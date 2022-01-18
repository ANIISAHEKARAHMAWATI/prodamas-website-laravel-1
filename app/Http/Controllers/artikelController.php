<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ArticleAdmin;
use App\Models\VideoAdmin;
use Share;
use DB;


class artikelController extends Controller
{
    public function index(){
        $artikel = ArticleAdmin::where('status', 'published')->get();
        // dd($artikel);
        $artikelupdate = ArticleAdmin::where('status', 'published') 
                ->orderBy('id', 'asc') 
                ->take(4) 
                ->get();
        return view('artikel.index', compact('artikel','artikelupdate'));
    }

    public function beranda()
    {
        $artikel = ArticleAdmin::where('status', 'published') 
                ->orderBy('id', 'asc') 
                ->take(3) 
                ->get();
        
        $video = VideoAdmin::orderBy('id', 'asc') 
                ->take(3) 
                ->get();

        // dd($video);
      
        return view('beranda.index', compact('artikel','video'));
    }

    public function show($id){
        $artikel = ArticleAdmin::where('id', $id)->get();
        // dd($artikel);
        return view ('artikel.artikelLay', compact('artikel'));
    }

    // public function ShareWidget()
    // {
    //     $shareComponent = Share::page(
    //         'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
    //         'Your share text comes here',
    //     )
    //     ->facebook()
    //     ->twitter()
    //     ->linkedin()
    //     ->telegram()
    //     ->whatsapp();
    //     //dd($shareComponent);
    //     return view('artikel.index', compact('shareComponent'));
    // }
}
