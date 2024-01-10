<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table_round extends CI_Model
{
    private $table="round";

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
		$this->db->order_by('id','DESC');
        return $this->db->get($this->table)->result();
    }

    public function add($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get($id)
    {
		$this->db->select('
			round.*,
			COUNT(round_detail.players_id) as players,
			SUM(round_detail.registration) as registration,
		');
		$this->db->join('round_detail','round.id = round_detail.round_id');
        $this->db->where($id);
		$this->db->group_by('round.id');
		$this->db->order_by('id','DESC');
        return $this->db->get($this->table)->row();
    }

    public function active()
    {
        $this->db->where('close',0);
		$this->db->order_by('id','DESC');
        return $this->db->get($this->table)->row();
    }

    public function result($id)
    {
        $this->db->where($id);
        return $this->db->get($this->table)->result();
    }

    public function count()
    {
		$this->db->select('
			round.*,
			COUNT(round_detail.players_id) as players,
			SUM(round_detail.registration) as registration,
		');
		$this->db->join('round_detail','round.id = round_detail.round_id');
		$this->db->group_by('round.id');
		$this->db->order_by('id','DESC');
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
