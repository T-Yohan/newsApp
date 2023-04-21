<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsStandardController extends Controller
{
    public function index($id=0)
    {
        if ($id!=0) {  //si id=0 on liste les news par cathégorie sinon on liste tout
            # code...
            $actus = News::where('category_id',$id)->orderBy('created_at','desc')->paginate(2) ; //afficher les news de la category id
        }else {
            # code...
            $actus = News::orderBy('created_at','desc')->paginate(6) ; //afficher les news par dates de création limite 6
        }




        $categories = Category::orderBy('name','asc')->get();

        return view('news.standard',compact('actus','categories'));
    }
    public function detail(News $actu)
    {
        return view('news.standardDetail', compact('actu'));
    }
}
