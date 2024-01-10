<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_players extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!($this->session->userdata('logged_in'))){
            redirect('login');
        }
        
        $this->load->model('data/table_players');

    }

    public function index()
    {
        

        $title['display']   = "Data Pemain";
        $title['parent']    = "Data Pemain";
        $title['level'][0]  = "Data";
        $title['href'][0]   = "";
        $title['level'][1]  = "Pemain";
        $title['href'][1]   = "";


        $this->load->view(
            'data/players',
            compact(
                'title',
            )
        );
    }

    public function data()
    {
        $players = $this->table_players->all();
        $no = 1;
        foreach ($players as $d) {
            $tbody = array();
            $tbody[] = $no++;
            if($d->photo == NULL || $d->photo == ""):
                $tbody[] = '<a href="#" class="font-weight-600"><img src="'.base_url().'assets/img/avatar/avatar-5.png" alt="avatar" width="50" class="rounded-circle mr-1"> '.$d->name.'</a>';
            else:
                $tbody[] = '<a href="#" class="font-weight-600"><img src="'.base_url().'assets/uploads/images/players/thumbnail/'.$d->photo.'" alt="avatar" width="50" class="rounded-circle mr-1"> '.$d->name.'</a>';
            endif;
            $tbody[] = "Rp. 0";
            $tbody[] = "0";
            $tbody[] = "0";
            $tbody[] = "0";
            $tbody[] = $d->redeem;
            $aksi = "<button class='btn btn-warning row-edit' data-toggle='modal' data-id=".$d->id."><i class='fas fa-pen mr-2'></i> Ubah Data</button>";
            $aksi .= " <button class='btn btn-info row-image' data-toggle='modal' data-id=".$d->id."><i class='fas fa-image mr-2'></i> Ubah Foto</button>";
            $aksi .= " <button class='btn btn-danger row-delete' id='id' data-toggle='modal' data-id=".$d->id."><i class='fas fa-times mr-2'></i> Hapus</button>";
            $tbody[] = $aksi;
            $data[] = $tbody; 
        }

        if ($players) {
            echo json_encode(array('data'=> $data));
        }else{
            echo json_encode(array('data'=>0));
        }
    }

    public function create()
    {
        
		$config['upload_path'] = './assets/uploads/images/players';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('photo')){
			$size = $this->upload->data('file_size');
			$name = $this->upload->data('file_name');
			if ($size < 2048) {
			  $this->resizeImage($name);
			  $data['photo']   = $name;
		  }
		}

		$data['name']       	= $this->input->post('name');
		$data['redeem']     	= 0;

		$result = $this->table_players->add($data);
		echo json_encode($result);

    }

    public function get()
    {
        $id['id'] = $this->input->post('id');

        $data = $this->table_players->get($id);
        echo json_encode($data);
    }

    public function update()
    {
        
        $id['id']		= $this->input->post('e_id');
		$data['name']	= $this->input->post('e_name');

		$result = $this->table_players->update($id,$data);
		echo json_encode($result);
    }

    public function update_image()
    {
        $config['upload_path'] = './assets/uploads/images/players';
  		$config['allowed_types'] = 'jpg|jpeg|png|gif';

  		$this->load->library('upload', $config);
  		$this->upload->initialize($config);

  		if($this->upload->do_upload('i_photo')){
  			$size = $this->upload->data('file_size');
  			$name = $this->upload->data('file_name');
  			if ($size < 2048) {
                $uploadedImage = $this->upload->data();
                $this->resizeImage($uploadedImage['file_name']);

                $id['id']   	= $this->input->post("i_id");
                $data['photo']	= $name;
                $result = $this->table_players->update($id,$data);

                $photo1 = './assets/uploads/images/players/'.$this->input->post("i_photo_old");
                $photo2 = './assets/uploads/images/players/thumbnail/'.$this->input->post("i_photo_old");

                if(is_file($photo1)){
                    unlink($photo1);
                }
                if(is_file($photo2)){
                    unlink($photo2);
                }
                echo json_encode($result);
            }
  		}
    }

    public function delete()
    {
        $id['id'] = $this->input->post('id');
        $data = $this->table_players->get($id);
		$photo1 = './assets/uploads/images/players/'.$data->photo;
		$photo2 = './assets/uploads/images/players/thumbnail/'.$data->photo;

		if(is_file($photo1)){
			unlink($photo1);
		}
		if(is_file($photo2)){
			unlink($photo2);
		}

        $result = $this->table_players->delete($id);
        echo json_encode($result);
    }

	public function resizeImage($filename)
    {
       $source_path = './assets/uploads/images/players/' . $filename;
       $target_path = './assets/uploads/images/players/thumbnail';
       $config_manip = array(
           'image_library' => 'gd2',
           'source_image' => $source_path,
           'new_image' => $target_path,
           'contenttain_ratio' => TRUE,
           'create_thumb' => TRUE,
           'thumb_marker' => '',
           'width' => 150,
           'height' => 150
       );
 
 
       $this->load->library('image_lib', $config_manip);
       if (!$this->image_lib->resize()) {
           echo $this->image_lib->display_errors();
       }
 
 
       $this->image_lib->clear();
    }

}
