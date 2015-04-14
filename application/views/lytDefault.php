<?php	
	echo $this->load->view('layout/base/lytBaseHead');
    echo $this->load->view($contentView);
    echo $this->load->view('layout/base/lytBaseFoot');
?>