<?php namespace Lib\Gestion;

use Str;
use Config;
use User;

class ImageGestion implements ImageGestionInterface {

    
    public function show($id)
    {       
        $user = User::find($id);
        return compact('user');

    }
    
    public function save($image, $id)
    {
            $chemin = Config::get('image.path');
            $extension = $image->getClientOriginalExtension();
            do {
                    $nom = Str::random(10) . '.' . $extension;
            } 
            while(file_exists($chemin . '/' . $nom));

            //add to BDD
            $user = User::find($id);
            $user->image = $nom;
            $user->save();

            return $image->move($chemin, $nom);
    }

}