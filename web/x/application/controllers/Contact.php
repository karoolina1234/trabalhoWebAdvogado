<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{

    public function index(){

        $data = array(

            "styles" => array(
                "dataTables.bootstrap.min.css",
                "datatables.min.css"
            ),
			"scripts" => array(
				"owl.carousel.min.js",
				"theme-scripts.js" ,
				"sweetalert2.all.min.js",
				"dataTables.bootstrap.min.js",
				"datatables.min.js",
				"util.js",
				"contact.js" 

            )
			
		);
        $this->template->show("contact.php",$data);
    }


	public function ajax_save_cliente() {

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["error_list"] = array();

		$this->load->model("clientes_model");

		$data = $this->input->post();

	

		if (empty($data["cliente_nome"])) {
			$json["error_list"]["#cliente_nome"] = "O nome completo não pode estar vazio";
		}
		
		if (empty($data["cliente_email"])) {
			$json["error_list"]["#cliente_email"] = "Email obrigatório";
		}
		

	

			if (empty($data["cliente_id"])) {
				$this->clientes_model->insert($data);
			} else {
				$cliente_id = $data["cliente_id"];
				unset($data["cliente_id"]);
				$this->clientes_model->update($cliente_id, $data);
			}
		

		echo json_encode($json);
	}



	public function ajax_list_cliente(){
		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}
			$this->load->model("clientes_model");
			$clientes = $this->clientes_model->get_datatable();
			$data = array();

			foreach($clientes as $cliente){

				$row = array();
				$row[] = $cliente->cliente_nome;

				$row[] = $cliente->cliente_email;
				$row[]='<div class="description">'.$cliente->cliente_mensagem.'</div>';

				


				$data[] = $row;			}

			$json = array(
				"draw"=>$this->input->post("draw"),
				"recordsTotal"=>$this->clientes_model->records_total(),
				"recordsFiltered"=>$this->clientes_model->records_filtered(),
				"data"=>$data,
			);
				echo json_encode($json);
		}
	}

