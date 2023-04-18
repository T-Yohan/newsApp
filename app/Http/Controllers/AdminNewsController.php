<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    //
    public function index(){

       // $actus = News::all();//lister tout

        $actus = News::orderBy('created_at' , 'desc')->paginate(10);//lister en ordre decroissant par rapport à la table created_at

        return view('adminnews.liste' , compact('actus'));//envoyer la variable dans la vue

    }

    public function formAdd()
    { //affichage de mon formulaire
        return view('adminnews.edit');
    }

    public function add(Request $request){
     //ajouter des informations
        $newsModel = new News;  //création d'une instance de classe (model News) pour enregister en base
        //vérification des données du formulaire
        /***titre obligatoire
         *
         */
        $request->validate(['titre'=>"required|min:5"]);
        //gestion de l'upload de l'image
        if ($request->file()) {
            $fileName = $request->image->store('public/images');//renommer le fichier de destination
            $newsModel->image = $fileName ;
        }
        $newsModel->description = $request->description;

        $newsModel->titre = $request->titre;
        $newsModel->save(); //enregistrement
        return redirect(route('news.add'));
    }

    public function formEdit($id=0)
    { //affichage de mon formulaire
        $actu = News::findOrFail($id);
        return view('adminnews.edit' ,compact('actu'));
    }

    public function edit(Request $request , $id=0){
        $actu = News::findOrFail($id); //model News a modifier a partir de l'id

        $request->validate(['titre'=>"required|min:5"]);
        $actu->description = $request->description;
        $actu->titre = $request->titre;
        $actu->save(); //enregistrement
        return redirect(route('news.liste'));
    }

    public function delete($id=0){

        $actu = News::findOrFail($id); //recupération d'une news à partir de son identifiant
    //if($actu->image !='' )){ //verifier l'existence du fichier
        Storage::delete ($actu->image) ; //delete file
   //}

        $actu->delete(); //suppression de l'actualité à partir de l'identifiant



        return redirect(route('news.liste')) ;

    }


}
