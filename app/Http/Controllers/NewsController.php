<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    //
    public function index()
    {
        $actus = News::all() ; //lister tout
        return view('news',compact('actus'));

    }

    public function details($id)
    {
        $actu = News::find($id);  //voir les détails
        // dd($actu);
        return view('showNews',compact('actu'));
    }
}
