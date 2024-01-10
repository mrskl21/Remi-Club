<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_leaderboard extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('table_round_detail');
    }

    public function index()
    {

        $title['display']   = "Leaderboard";
        $title['parent']    = "Leaderboard";
        $title['level'][0]  = "Utama";
        $title['href'][0]   = "";
        $title['level'][1]  = "Leaderboard";
        $title['href'][1]   = "";

		$count = $this->table_round_detail->count_score();

        $this->load->view(
            'dash/leaderboard', 
            compact(
                'title',
                'count',
            )
        );
    }
}

