<?php 

class Error extends CI_Controller{
    public function index(){ 
        $this->load->view('header');
        $this->load->view('404');
        $this->load->view('footer');
    }
}