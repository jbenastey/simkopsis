<?php

class PenarikanModel extends GLOBAL_Model{

	public function __construct()
	{
		parent::__construct();
	}

	/*
	 * insert modul
	 * */

	public function insert($dataPenarikan)
    {
        return parent::insert_with_status('simkopsis_penarikan',$dataPenarikan);
    }
}
