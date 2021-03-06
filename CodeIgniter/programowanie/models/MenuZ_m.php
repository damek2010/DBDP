<?php
class MenuZ_m extends CI_Model {

	private $wynik;
	private $proj;

        public function start($src)
        {
			$this->wynik = '';
			if(!empty($src) && $src!="zadaniek") {
				$this->proj = '/' . $src;
			}
			$this->menu();
			return $this->wynik;
        }
	private function menu()
	{
		$this->wynik.= '<div class="panel-body">
					    <div class="row">
						<div class="col-xs-6 col-md-6">
						  <a href="/ci/zadanie_add" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-plus"></span> <br/>Nowy</a>
						  <a href="/ci/zadanie" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-search"></span> <br/>Wyświetl</a>
						  <a href="/ci/zadanie_edit" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-retweet"></span> <br/>Edytuj</a>
						  <a href="/ci/zadanie_del" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-trash"></span> <br/>Usuń</a>
						</div>
						<div class="col-xs-6 col-md-6">
						  <a href="/ci/projekt_look" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Projekty</a>
						  <a href="/ci/sprint' . $this->proj . '" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-repeat"></span> <br/>Sprinty</a>
						  <a href="/ci/user" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>User</a>
						  <a href="/ci/wyloguj" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-off"></span> <br/>Wyloguj</a>
						</div>
					    </div>
					</div>';
	}
}
