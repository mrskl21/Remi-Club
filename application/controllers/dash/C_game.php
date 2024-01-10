<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_game extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('table_round');
        $this->load->model('table_round_detail');
        $this->load->model('data/table_players');
    }

    public function index()
    {

        $title['display']   = "Game";
        $title['parent']    = "Game";
        $title['level'][0]  = "Utama";
        $title['href'][0]   = "";
        $title['level'][1]  = "Game";
        $title['href'][1]   = "";

		$round = $this->table_round->active();
		$players = $this->table_players->all();

        $this->load->view(
            'dash/game', 
            compact(
                'title',
                'round',
                'players',
            )
        );
    }

    public function create_round()
    {

        $data['start'] 	= time();
        $data['close'] 	= 0;

		$this->table_round->add($data);
		$this->session->set_flashdata('success',"Berhasil! Ronde Permainan Telah Dibuat.");
		redirect("game");
    }

    public function member($round_id)
    {
		$param['round_detail.round_id'] = $round_id;
        $member = $this->table_round_detail->result($param);

        $no = 1;
        foreach ($member as $d) {
            $tbody = array();
            $tbody[] = $no++;
            if($d->players_photo == NULL || $d->players_photo == ""):
                $tbody[] = '<a href="#" class="font-weight-600"><img src="'.base_url().'assets/img/avatar/avatar-5.png" alt="avatar" width="30" class="rounded-circle mr-1"> '.$d->players_name.'</a>';
            else:
                $tbody[] = '<a href="#" class="font-weight-600"><img src="'.base_url().'assets/uploads/images/players/thumbnail/'.$d->players_photo.'" alt="avatar" width="30" class="rounded-circle mr-1"> '.$d->players_name.'</a>';
            endif;

			if($d->debt == 1){
				$tbody[] = "<span class='btn btn-sm btn-info'>CU</span>";
			}else{
				$tbody[] = "Rp. ".number_format($d->registration);
			}

			$game = '<div class="btn-group" role="group" aria-label="Basic example">';
			$game .= '<button type="button" id="id" data-id="'.$d->id.'" class="btn btn-light game-minus">-</button>';
			$game .= '<button type="button" class="btn btn-light font-weight-700">'.number_format($d->game).'</button>';
            $game .= '<button type="button" id="id" data-id="'.$d->id.'" class="btn btn-light game-plus">+</button>';
			$game .= '</div>';
            $tbody[] = $game;

			$win = '<div class="btn-group" role="group" aria-label="Basic example">';
			$win .= '<button type="button" id="id" data-id="'.$d->id.'" class="btn btn-light win-minus">-</button>';
			$win .= '<button type="button" class="btn btn-light font-weight-700">'.number_format($d->win).'</button>';
            $win .= '<button type="button" id="id" data-id="'.$d->id.'" class="btn btn-light win-plus">+</button>';
			$win .= '</div>';
            $tbody[] = $win;

			$point = '<div class="btn-group" role="group" aria-label="Basic example">';
			$point .= '<button type="button" id="id" data-id="'.$d->id.'" class="btn btn-light point-minus">-</button>';
			$point .= '<button type="button" class="btn btn-light font-weight-700">'.number_format($d->point).'</button>';
            $point .= '<button type="button" id="id" data-id="'.$d->id.'" class="btn btn-light point-plus">+</button>';
			$point .= '</div>';
            $tbody[] = $point;

            $tbody[] = "<button class='btn btn-primary btn-sm row-delete' id='id' data-toggle='modal' data-id=".$d->id."><i class='fas fa-times mr-2'></i> Hapus</button>";

            $data[] = $tbody; 
        }

        if ($member) {
            echo json_encode(array('data'=> $data));
        }else{
            echo json_encode(array('data'=>0));
        }
    }

    public function add_member()
    {
        $data['round_id'] 		= $this->input->post('round_id');
        $data['players_id'] 	= $this->input->post('players_id');

		$check = $this->table_round_detail->get($data);

		if($check == NULL){
			$data['registration'] 	= $this->input->post('registration');
			$data['debt'] 			= ($this->input->post('registration')==0)?1:0;
			$data['game'] 			= 0;
			$data['win'] 			= 0;
			$data['point'] 			= 0;
	
			$result = $this->table_round_detail->add($data);
			echo json_encode($result);
		}else{
            header('HTTP/1.1 500 Internal Server Error');
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
		}
    }

    public function delete_member()
    {
        $id['id'] = $this->input->post('id');

        $result = $this->table_round_detail->delete($id);
        echo json_encode($result);
    }

    public function game_plus()
    {
        $id['id'] = $this->input->post('id');
		$data = $this->table_round_detail->get($id);

		$update['game'] = $data->game+1;
        $result = $this->table_round_detail->update($id,$update);
        echo json_encode($result);
    }

    public function game_minus()
    {
        $id['id'] = $this->input->post('id');
		$data = $this->table_round_detail->get($id);

		if($data->game == 0){
			$update['game'] = $data->game;
		}else{
			$update['game'] = $data->game-1;
		}
        $result = $this->table_round_detail->update($id,$update);
        echo json_encode($result);
    }

    public function win_plus()
    {
        $id['id'] = $this->input->post('id');
		$data = $this->table_round_detail->get($id);

		$update['win'] = $data->win+1;
        $result = $this->table_round_detail->update($id,$update);
        echo json_encode($result);
    }

    public function win_minus()
    {
        $id['id'] = $this->input->post('id');
		$data = $this->table_round_detail->get($id);

		if($data->win == 0){
			$update['win'] = $data->win;
		}else{
			$update['win'] = $data->win-1;
		}
        $result = $this->table_round_detail->update($id,$update);
        echo json_encode($result);
    }

    public function point_plus()
    {
        $id['id'] = $this->input->post('id');
		$data = $this->table_round_detail->get($id);

		$update['point'] = $data->point+1;
        $result = $this->table_round_detail->update($id,$update);
        echo json_encode($result);
    }

    public function point_minus()
    {
        $id['id'] = $this->input->post('id');
		$data = $this->table_round_detail->get($id);

		if($data->point == 0){
			$update['point'] = $data->point;
		}else{
			$update['point'] = $data->point-1;
		}
        $result = $this->table_round_detail->update($id,$update);
        echo json_encode($result);
    }

    public function close_round()
    {

        $id['id'] 		= $this->input->post('round_id');
        $data['close'] 	= time();

		$this->table_round->update($id,$data);
		$this->session->set_flashdata('success',"Berhasil! Ronde Permainan Telah Ditutup.");
		redirect("game");
    }

}

/* End of file Controllername.php */
