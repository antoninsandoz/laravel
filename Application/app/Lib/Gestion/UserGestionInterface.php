<?php namespace Lib\Gestion;

interface UserGestionInterface {

	public function store();
	public function show($id);
	public function update($id);
	public function destroy($id);
        public function update_password($id);

}