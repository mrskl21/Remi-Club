<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table_round_detail extends CI_Model
{
    private $table="round_detail";

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        return $this->db->get($this->table)->result();
    }

    public function add($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get($id)
    {
        $this->db->where($id);
        return $this->db->get($this->table)->row();
    }

    public function result($id)
    {
		$this->db->select('
			round_detail.*,
			data_players.name as players_name,
			data_players.photo as players_photo
		');
		$this->db->join('data_players','data_players.id = round_detail.players_id');
        $this->db->where($id);
        return $this->db->get($this->table)->result();
    }

    public function count_score()
    {
		$this->db->select('
			round_detail.players_id,
			data_players.name as players_name,
			data_players.photo as players_photo,
			SUM(round_detail.registration) as registration,
			SUM(round_detail.debt) as debt,
			SUM(round_detail.game) as game,
			SUM(round_detail.win) as win,
			SUM(round_detail.point) as point
		');
		$this->db->join('data_players','data_players.id = round_detail.players_id');
        $this->db->group_by('round_detail.players_id');
        $this->db->order_by('point','DESC');
        return $this->db->get($this->table)->result();
    }

    public function update($id, $data)
    {
        $this->db->where($id);
        $this->db->update($this->table,$data);
    }

    public function delete($id)
    {
        $this->db->where($id);
        $this->db->delete($this->table);
    }
    
}
