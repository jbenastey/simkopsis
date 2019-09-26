<?php

class AngsuranModel extends GLOBAL_Model{
	public function __construct()
	{
		parent::__construct();
	}

	public function tambah($data){
		return parent::insert_with_status('simkopsis_angsuran',$data);
	}

}
