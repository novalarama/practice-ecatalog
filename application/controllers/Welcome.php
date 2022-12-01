<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("buku_model", "buku");
		$this->load->model("penerbit_model", "penerbit");
		$this->load->helper('text');
	}

	//http://localhost/ekatalog/index.php/welcome/index
	public function index()
	{
		$kw = $this->input->get('search');
		$data = array();
		$limit_per_page = 3;
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->buku->get_total();
		$data['penerbits'] = $this->penerbit->find_all();
		if (!empty($kw)) {
			$total_records = $this->buku->get_total_search($kw);
		}
		$data["records"] = $this->buku->search($kw, $limit_per_page, $start_index);


		if ($total_records > 0) {
			//get current page records
			$data["records"] = $this->buku->pagination($limit_per_page, $start_index);
			if (!empty($kw)) {
				$data["records"] = $this->buku->search($kw, $limit_per_page, $start_index);
			}
			$config['base_url'] = base_url() . "welcome/index"; //halaman tempat settingan url dari link pagination
			$config['total_rows'] = $total_records; //pengaturan jumlah dari seluruh record
			$config['per_page'] = $limit_per_page; //jumlah record yang ditampilkan perhalaman
			$config['uri_segment'] = 3;
			/*
			start
			add boostrap class and styles
			*/
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['first_tag_close'] = '</span></li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['prev_tag_close'] = '</span></li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['next_tag_close'] = '</span></li>';
			$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['last_tag_close'] = '</span></li>';
			$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close'] = '</span></li>';
			/*
			end
			add boostrap class and styles
			*/
			$this->pagination->initialize($config);
			//build paging links
			$data["links"] = $this->pagination->create_links();
			$data['search'] = $kw;
		}
		$this->load->view('welcome_message', $data);
	}

	function detail() {
        $id = $this->uri->segment(3);
        if ($id) {
            $this->data = $this->buku->find_by_id($id);
        }
        $this->data['penerbits'] = $this->penerbit->find_all();
        $this->load->view('detail', $this->data);
    }

	//http://localhost/ekatalog/index.php/welcome/hello
	public function hello()
	{
		$data['nama'] = "Denny";
		$data['nim'] = "123456";
		//mendapatkan variabel $_GET[]
		$data['word'] = $this->input->get('word');
		//passing data ke view
		$this->load->view('hello', $data);
	}

	//TODO : Buat view untuk ini
	//http://localhost/ekatalog/index.php/welcome/profile
	public function profile()
	{
		//load view di folder profile kemudian file index.php
		$this->load->view('profile/index');
	}

	public function nilai()
	{
		$nilai1 = $this->uri->segment(3);
		$nilai2 = $this->uri->segment(4);
		echo $nilai1;
	}
}