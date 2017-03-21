<?php
class Look_m extends CI_Model {

	private $wynik;
 
        public function start()
        {
			$this->wynik = '';
			$this->look();
			return $this->wynik;
        }
	
	private function uzupelnienie()
	{
		$zapytanie = 'SELECT * FROM Projekty;';
		$query = $this->db->query($zapytanie);
		$dane = '';

		foreach ($query->result() as $row)
		{
			$dane .= '<tr>
					<td>' . $row->id_projektu . '</td>
					<td>' . $row->nazwa_projektu . '</td>
					<td>' . $row->data_startu . '</td>
					<td>' . $row->data_zakonczenia . '</td>
				</tr><br/>';
		}
		
		return $dane;
	}
	
	private function look()
	{
		$this->wynik.= '<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>ID Projektu</th>
								<th>Nazwa Projektu</th>
								<th>Data Startu</th>
								<th>Data Zakończenia</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID Projektu</th>
								<th>Nazwa Projektu</th>
								<th>Data Startu</th>
								<th>Data Zakończenia</th>
							</tr>
						</tfoot>
						<tbody>
							' . $this->uzupelnienie() . '
						</tbody>
					    </table>';
	}
}
