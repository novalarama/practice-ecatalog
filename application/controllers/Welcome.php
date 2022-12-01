<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("buku_model", "buku");
		$this->load->model("penerbit_model", "penerbit");
	}

	//http://localhost/ekatalog/index.php/welcome/index
	public function index()
	{
		$kw = $this->input->get('search');
		$data['records'] = $this->buku->find_all();
		$data['penerbits'] = $this->penerbit->find_all();
		if (!empty($kw)) {
			$data['records'] = $this->buku->search($kw);
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