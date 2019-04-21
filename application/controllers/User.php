<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('user_m');
	}

	function index(){
		$this->load->view('layout/header');
		$this->load->view('user/index');
		$this->load->view('layout/footer');
		 
	}

	public function showAllUser(){
		$result = $this->user_m-> showAllUser();
		// echo "<pre>";
		// print_r($result);
		// return json_encode($result);
		echo json_encode($result);
		 

	}

 
	 

}