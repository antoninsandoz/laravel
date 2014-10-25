<?php namespace Lib\Gestion;

use User;
use Boxe;
use Picture;
use Input;
use Hash;

class AdminWallGestion implements AdminWallGestionInterface {
      
    
    public function boxcheck($id, $id_b)
    {
        
        //find user of this box
        $user = Boxe::find($id_b)->user;
        //check if user of this box and actual user is the same
        if($user->id == $id)
            return true;
        else
            return false;

    }
    
    public function adminindex($id_b)
    {       
            $user = Boxe::find($id_b)->user;
            $boxes = User::find($user->id)->boxes;
            $boxe = User::find($id_b)->boxes;
            $boxe = $boxe[0];

            //find picture the boxes use
            $pictures = Boxe::find($id_b)->pictures;

            //Reverse for recent pictures first
            $pictures = array_values(array_reverse(array_sort($pictures, function($value)
            {
                return $value['date'];
            })));

            //Number of picture today
            $date_today = time();
            $pictureoftheday = Picture::where('date', '>', $date_today)->where('boxe_id', '=', $id_b)->count();
            //Number of picture for week
            $date_lastweek = time()+(7 * 0 * 0 * 0);
            $pictureoftheweek = Picture::where('date', '>', $date_lastweek)->where('boxe_id', '=', $id_b)->count();

            return compact('user', 'boxes', 'boxe', 'pictures', 'pictureoftheday', 'pictureoftheweek');

    }

}