<?php 

$this->load->library('session');
$lang = $this->session->userdata('lang');
if(isset($lang)){
    $lang = $this->session->userdata('lang');
}else{
    $language = array('lang'=>$data);
    $hasil = $this->db->select("*")->from("language")->get()->result();
    foreach($hasil as $row){
        $language[$row->content] = $row->ind;
    }
    $this->session->set_userdata($language);
}

?>