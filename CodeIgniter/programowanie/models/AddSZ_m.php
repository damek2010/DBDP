<?php
class AddSZ_m extends CI_Model {

	private $wynik;
	private $src;

        public function start($src)
        {
			$this->wynik = '';
			$this->src = $src;
			$this->add();
			return $this->wynik;
        }
	
	private function zadania() {
		$zadania = '';
		$zapytanie = 'SELECT * FROM Zadania;';
		$zapytanie2 = 'SELECT * FROM Sprinty_Zadania;';
		$query = $this->db->query($zapytanie);
		$query2 = $this->db->query($zapytanie2);
		$is = false;
		foreach ($query->result() as $row) {
			foreach ($query2->result() as $row2) {
				if($row->id_zadania == $row2->Zadania_ID && $row2->Sprinty_ID==$this->src)
				{
					$is = true;
				}
			}
			if(!$is) {
				$zadania.='	<div class="radio">
							<label><input type="radio" name="optradio" value="' . $row->id_zadania . '">' . $row->id_zadania . '</label>
						</div>';
			}
			$is = false;
		}

		$zadania.='';
		return $zadania;
	}
	
	private function add()
	{
		$this->wynik.= '<form class="form-horizontal" action="/ci/sprintk_add_zadanie_action" method="POST">
						<fieldset>

						<!-- Form Name -->
						<center><legend>Dodaj Zadanie do sprintu</legend></center>

						
						<!-- Text input-->
						<input id="textinput0" name="textinput0" type="hidden" class="form-control input-md" value="' . $this->src . '">
						
						<div class="form-group">
							<label class="col-md-4 control-label" for="optradio">ID sprintu</label>  
							<div class="col-md-6">
								' . $this->zadania() . '
							</div>
						</div>

						<!-- Button -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="button"></label>
						  <div class="col-md-4">
						    <button id="button" name="button" class="btn btn-success">Dodaj</button>
						  </div>
						</div>
						</fieldset>
						</form> 
						<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
						<script>$(".data").mask("0000-00-00");</script>';
	}
}
