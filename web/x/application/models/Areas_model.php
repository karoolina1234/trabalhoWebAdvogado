

<?php

class Areas_model extends CI_Model{
        public function __construct(){
        parent::__construct();
        $this->load->database();

	}
	public function show_areas(){ //Mostrar areas Get do resultado do array
		$this->db->from("areas");
		return $this->db->get()->result_array();

	}
  
   
		public function get_data($id, $select = NULL){ // se não estiver vazio ele chama este select da tabela de areas
            if(!empty($select)){
               $this->db->select($select);

            }
            $this->db->from("areas");
            $this->db->where("area_id",$id);
           return $this->db->get();


        }

        public function insert($data){
               $this->db->insert("areas",$data); //Add

            
           
        }


        public function update($id, $data){ //editar
            $this->db->where("area_id",$id);
            $this->db->update("areas",$data);


        }

        public function delete($id){ //deletar
            $this->db->where("area_id",$id);
            $this->db->delete("areas");


        }

        public function is_duplicated($field, $value, $id=NULL){

            // função p verificar se o usuario ja foi cadastrado 
            if(!empty($id)){
                $this->db->where("area_id <> ",$id);

            }
            $this->db->from("areas");
            $this->db->where($field, $value);

            return $this->db->get()->num_rows() > 0;

        }


        var $column_search = array("area_name", "area_description"); //Procurando a coluna nome e a descrição
	var $column_order = array("area_name"); //ordem nome area

	private function _get_datatable() {  // Pegar infos tabela

		$search = NULL;
		if ($this->input->post("search")) {     //pesquisa com o valor inserido
			$search = $this->input->post("search")["value"];
		}
		$order_column = NULL;
		$order_dir = NULL;
		$order = $this->input->post("order");
		if (isset($order)) {
			$order_column = $order[0]["column"];
			$order_dir = $order[0]["dir"];
		}

		$this->db->from("areas");
		if (isset($search)) {
			$first = TRUE;
			foreach ($this->column_search as $field) {
				if ($first) {
					$this->db->group_start();
					$this->db->like($field, $search);
					$first = FALSE;
				} else {
					$this->db->or_like($field, $search);
				}
			}
			if (!$first) {
				$this->db->group_end();
			}
		}

		if (isset($order)) {
			$this->db->order_by($this->column_order[$order_column], $order_dir);
		}
	}

	public function get_datatable() {

		$length = $this->input->post("length");
		$start = $this->input->post("start");
		$this->_get_datatable();
		if (isset($length) && $length != -1) {
			$this->db->limit($length, $start);
		}
		return $this->db->get()->result();
	}

	public function records_filtered() {

		$this->_get_datatable();
		return $this->db->get()->num_rows();

	}

	public function records_total() {

		$this->db->from("areas");
		return $this->db->count_all_results();

	}

}