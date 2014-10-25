<?php namespace Lib\Gestion;

interface LikeGestionInterface {

        public function add($id, $id_p);
        public function remove($id, $id_p);
}