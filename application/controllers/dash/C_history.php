<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_history extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('table_round');
        $this->load->model('table_round_detail');
    }

    public function index()
    {

        $title['display']   = "Riwayat";
        $title['parent']    = "Riwayat";
        $title['level'][0]  = "Utama";
        $title['href'][0]   = "";
        $title['level'][1]  = "Riwayat";
        $title['href'][1]   = "";

		$round = $this->table_round->count();

        $this->load->view(
            'dash/history', 
            compact(
                'title',
                'round',
            )
        );
    }

    public function detail($id)
    {

        $title['display']   = "Ronde";
        $title['parent']    = "Riwayat";
        $title['level'][0]  = "Utama";
        $title['href'][0]   = "";
        $title['level'][1]  = "Riwayat";
        $title['href'][1]   = "";
        $title['level'][2]  = "Ronde";
        $title['href'][2]   = "";

		$param['round.id'] = $id;
		$round = $this->table_round->get($param);
		
		$param2['round_detail.round_id'] = $id;
		$detail = $this->table_round_detail->result($param2);

        $this->load->view(
            'dash/history_detail', 
            compact(
                'title',
                'round',
                'detail',
            )
        );
    }
}

