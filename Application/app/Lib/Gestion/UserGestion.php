<?php namespace Lib\Gestion;

use User;
use Boxe;
use Picture;
use Input;
use Hash;

class UserGestion implements UserGestionInterface {

    private function save($user)
    {

            $user->username = Input::get('username');
            $user->email = Input::get('email');
            //$user->image = Input::get('image');
            //$user->city = Input::get('city');
            $user->country = Input::get('country');
            $user->sex = Input::get('sex');
            $user->Languages_iso = Input::get('Languages_iso');

            $user->save();

    }

    //sore data on DataBase
    public function store()
    {
            $user = new User;
            //passeord is coded in classe Hash (cryptage Bcrypt)
            //$user->password = Hash::make(Input::get('password'));
            $this->save($user);
    }

    public function show($id)
    {       
        $user = User::find($id);
        return compact('user');

    }

    public function update_password($id)
    {
            $user = User::find($id);
            //passeord is coded in classe Hash (cryptage Bcrypt)
            $user->password = Hash::make(Input::get('password'));
            $user->save();
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