<?php
class Latihan extends  CI_Controller {
    public function tampil() {
        $data['nama'] = "Noval Akbar";

        $this->load->view('v_latihan',$data);
    }
}

?>