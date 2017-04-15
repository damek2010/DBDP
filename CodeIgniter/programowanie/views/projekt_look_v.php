<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

					<div class="panel-body" style="margin-bottom: 50px;">
					    <div class="row">
						<form class="form-horizontal">
						<fieldset>

						<!-- Form Name -->
						<center><legend>Projekty</legend></center>

						<!-- Text input-->
						
						<?= $look; ?>
						
						</fieldset>
						</form>
					</div>
				</div>
				    
<script type="text/javascript" language="JavaScript 1.5">
$(document).ready(function() {
    $('#example').DataTable({
        "language": {
	    "decimal":        "",
	    "emptyTable":     "Brak dostępnych danych w tabeli",
	    "info":           "Pokaż _START_ do _END_ z _TOTAL_ wpisów",
	    "infoEmpty":      "Pokaż 0 do 0 z 0 wpisów",
	    "infoFiltered":   "(filtered from _MAX_ total wpisów)",
	    "infoPostFix":    "",
	    "thousands":      ",",
	    "lengthMenu":     "Pokaż _MENU_ wpisów",
	    "loadingRecords": "Ładowanie...",
	    "processing":     "Przetwarzanie...",
	    "search":         "Szukaj:",
	    "zeroRecords":    "Brak pasujących wyników",
	    "paginate": {
		"first":      "Pierwszy",
		"last":       "Ostani",
		"next":       "Następny",
		"previous":   "Poprzedni"
	    },
	    "aria": {
		"sortAscending":  ": aktywuj aby sorotwać rosnąco",
		"sortDescending": ": aktywuj aby sortować malejąco"
	    }
	}
    });
} );
</script>


