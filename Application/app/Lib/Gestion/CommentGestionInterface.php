<?php namespace Lib\Gestion;

interface CommentGestionInterface {

        public function add($id, $id_p);
        public function update($id, $id_p);
        public function remove($id, $id_p);
        
}