<?php namespace Lib\Gestion;

interface WallGestionInterface {

	public function index($id, $pagination, $auth);
        public function show($id_p);
}