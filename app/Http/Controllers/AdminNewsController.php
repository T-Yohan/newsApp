<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    //
    public function formadd()
    { //affichage de mon formulaire
        return view('adminnews.add');
    }
    public function add(Request $request)
    { //ajouter des informations
        $newsModel = new News; //création d'une instance de classe (model News) pour enregister en base
        //vérification des données du formulaire
        /***titre obligatoire
         *
         */
        $request->validate(['titre'=>"required|min:5"]);
        //gestion de l'upload de l'image
        if ($request->file()) {
            $fileName = $request->image->store('images');//renommer le fichier de destination
            $newsModel->image = $fileName ;
        }
        $newsModel->description = $request->description;

        $newsModel->titre = $request->titre;
        $newsModel->save(); //enregistrement
        return redirect(route('news.add'));
    }

}
