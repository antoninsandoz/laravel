<?php namespace Lib\Gestion;

interface WallGestionInterface {

	public function index($id, $pagination);
        public function show($id_p);
}