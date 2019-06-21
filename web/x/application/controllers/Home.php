<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->library("session");
	}
	public function index()
	{


		$this->load->model("areas_model");
	   $areas=$this->areas_model->show_areas();

	   
		$this->load->model("team_model");
		$team = $this->team_model->show_team();


		$data = array(
			"scripts" => array(
				"owl.carousel.min.js",
				"theme-scripts.js" ,
				"util.js",
				"restrict.js" 
			),
			"areas" => $areas,
			"team" => $team
		);
		$this->template->show("home.php",$data);
	}

	
		
	
}
