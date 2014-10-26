<?php namespace Lib\Gestion;

interface CommentGestionInterface {

        public function add($id, $id_p);
        public function remove($id_c);
        public function belongs($id, $id_p);
        
}