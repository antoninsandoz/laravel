<?php namespace Lib\Gestion;

use User;
use Boxe;
use Picture;
use Input;
use Hash;

class UserGestion implements UserGestionInterface {

    private function save($user)
	{
		$user->name = Input::get('name');
		$user->email = Input::get('email');		
		$user->admin = Input::get('admin') ? 1 : 0;
		$user->save();
	}
        /*
	public function index($n)
	{
		$users = User::paginate($n);
		return compact('users');
	}
        */
        //sore data on DataBase
	public function store()
	{
		$user = new User;
                //passeord is coded in classe Hash (cryptage Bcrypt)
		$user->password = Hash::make(Input::get('password'));
		$this->save($user);
	}

	public function show($id)
	{       
                $user = Boxe::find($id)->user;
		$boxes = User::find($id)->boxes;
                
                //All pictures from all boxs
                foreach ($boxes as $key => $box) {
                    
                    $box_id = $box->id;
                    //find picture foreach boxes
                    $pictures[$box_id] = Boxe::find($box_id)->pictures;
                    //creat new object with all pictures of all boxs
                    $user_likes = 0;
                    $user_comments = 0;
                    $n=0;
                    foreach ($pictures as $picture) {  
                        foreach ($picture as $pict) {
                            $n++;
                            $allpictures[$n] = $pict;
                            //Count all user likes
                            if($pict->like >0)
                                $user_likes = $pict->like + $user_likes;
                            //Count all user comments
                            if($pict->like >0)
                                $user_comments = $pict->comment + $user_comments;
                            //Count all pictures
                            $user_pictures = $n;
                        }
                    }
                }

                return compact('user', 'boxes', 'allpictures','user_likes', 'user_comments', 'user_pictures');
                
	}

	public function edit($id)
	{
		$user = User::find($id);
		return compact('user');
	}

	public function update($id)
	{
		$user = User::find($id);
		$this->save($user);
	}

	public function destroy($id)
	{
		User::find($id)->delete();
	}

}