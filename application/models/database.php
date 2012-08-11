<?php

class Database extends CI_Model  {
		
		function __construct(){
		    
		    parent::__construct();
		    
//			echo "<script>
//				console.log('*******  php: Database::parent::__construct()  from model/database.php');
//			</script>";		    
		    
		}
		
		
		public static function test2() {
//			echo "<script>
//				console.log('php: Database::test2()  from model/database.php');
//			</script>";
		}	
		
		
		public  function test3() {
			echo "<script>
				console.log('php: Database::test2()  from model/database.php');
			</script>";
		}			
		
		
		
		public function create_generic_table($table){
		
				$fields_array = array(
				                        'id' => array(
				                                                 'type' => 'INT',
				                                                 'unsigned' => TRUE,
				                                                 'auto_increment' => TRUE
				                                      ),
				                        'created' => array(
				                                                 'type' => 'DATETIME'
				                                        ),
				                        'updated' => array(
				                                                 'type' => 'DATETIME'
				                                        )  
				                );
				                
				
				$this->create_table_with_fields($table, $primary_key = 'id', $fields_array);
		
		}
		
		
		function create_table_with_fields($table, $primary_key, $fields_array){
		
			$this->load->dbforge();
			$this->dbforge->add_field($fields_array);
			$this->dbforge->add_key($primary_key, TRUE);
			
			/**
			 * Returns TRUE/FALSE based on success or failure:
			 */
			return $this->dbforge->create_table($table, TRUE); // Only CREATE TABLE IF NOT EXISTS 
		}
		
		
		 
		function add_column_to_table_if_not_exist($table, $fields_array){
			
			
			$this->load->dbforge();
			
			
			foreach(  $fields_array as $field => $value){
				
				if( $this->db->field_exists($field, $table ) == FALSE){
					
					$this->dbforge->add_column($table, array($field => $value) );
					
				};
				
				
			}
		
		}
		
		public function create_fields_with_post($table, $post_array){
			
				foreach( $post_array  as  $key => $value){
					$this->add_column_to_table_if_not_exist(
							  $table
							, $fields_array = array(
											$key => array( 'type' => 'varchar(255)' )
								)
						);
				}
			
		}	
		 
		function insert_table($table, $insert_what){
		
			$insert_what['created'] = date('Y-m-d H:i:s'); 
			
			$this->db->insert($table, $insert_what);
			
			return $this->db->insert_id();
		}
		
		
		 
		function delete_from_table($table, $where_array){
			
			$this->db->delete($table, $where_array); 
			
		}
		
		
		function update_table( $table, $primary_key, $set_what_array ){
			
			$this->db->where('id', $primary_key);
			
			$set_what_array['updated'] = date('Y-m-d H:i:s'); 
			
			$this->db->update($table, $set_what_array); 
			
			return 'updated: ' . date('Y-m-d H:i:s');
			
		}
		
		
		
		function update_table_where( $table, $where_array, $set_what_array ){
		
			if( count($where_array) > 0 ){
				
				foreach( $where_array as $field => $value ){
					$this->db->where($field, $value);
				}		
				
			};
			
			$set_what_array['updated'] = date('Y-m-d H:i:s'); 
			
			$this->db->update($table, $set_what_array); 
			
			return 'updated: ' . date('Y-m-d H:i:s');
			
		}
		
		
		function select_from_query($query){
			return $this->db->query($query)->result_array();
		}
		
		
		function select_from_table( 
			$table, 
			$select_what, 
			$where_array, 
			$use_order = FALSE, 
			$order_field = '', 
			$order_direction = 'asc', 
			$limit = -1, 
			$use_join = FALSE, 
			$join_array = array(), 
			$group_by_array = array(),
			$or_where_array = array()
			){
		
			
			$this->db->select($select_what);
			
			if( count($where_array) > 0 ){
				
				foreach( $where_array as $field => $value ){
					$this->db->where($field, $value);
				}		
				
			};
			
		
			if( count($or_where_array) > 0 ){
				
				foreach( $or_where_array as $field => $value ){
					$this->db->or_where($field, $value);
				}		
				
			};	
		
		
			if( $use_order == TRUE){
				
				$this->db->order_by($order_field. ' '.$order_direction);
				
				
				if( $use_join == FALSE){
					
						$this->db->order_by('created desc');
					
				};
				
				
			}else{
				
				$this->db->order_by('created asc');
				
			};
			
			if( $limit == -1 ){
				
			}else{
				$this->db->limit($limit);
			};
			
			if( $use_join == TRUE){
				
		
					if( count($join_array) > 0 ){
						
						
				
						foreach( $join_array as $field => $value ){
							$this->db->join($field, $value);
						}		
						
					};
					
			};
			
			
			$this->db->group_by( $group_by_array );
			
			
			
			$query = $this->db->get($table); 
			
			return $query->result(); 
			
		}
		
		
		
		
		function select_from_table_left_join( 
			$table, 
			$select_what, 
			$where_array, 
			$use_order = FALSE, 
			$order_field = '', 
			$order_direction = 'asc', 
			$limit = -1, 
			$use_join = FALSE, 
			$join_array = array(), 
			$group_by_array = array(),
			$or_where_array = array(),
			$where_in_array = array(),
			$whereFieldIsSame = array()
			){
			
		
			
			$this->db->select($select_what);
			
			
			
			if( count($whereFieldIsSame) > 0 ){
				
				foreach( $whereFieldIsSame['ids'] as $id ){
					$this->db->where($whereFieldIsSame['field'], $id);
					echo 'where ' . $whereFieldIsSame['field'] . ' = ' . $id."<br />";
				}		
				
			};
			
			
			if( count($where_array) > 0 ){
				
				foreach( $where_array as $field => $value ){
					$this->db->where($field, $value);
				}		
				
			};
			
			
			if( count($where_in_array) > 0){
				
					$this->db->where_in($where_in_array['field'], $where_in_array['ids']);				
					
			};
			
		
			if( count($or_where_array) > 0 ){
				
				foreach( $or_where_array as $field => $value ){
					$this->db->or_where($field, $value);
				}		
				
			};	
		
		
			if( $use_order == TRUE){
				
				$this->db->order_by($order_field. ' '.$order_direction);
				
				
				if( $use_join == FALSE){
					
						$this->db->order_by('created desc');
					
				};
				
				
			}else{
				
				$this->db->order_by('created asc');
				
			};
			
			if( $limit == -1 ){
				
			}else{
				$this->db->limit($limit);
			};
			
			if( $use_join == TRUE){
				
		
					if( count($join_array) > 0 ){
						
						
				
						foreach( $join_array as $field => $value ){
							$this->db->join($field, $value, 'left');
						}		
						
					};
					
			};
			
			
			$this->db->group_by( $group_by_array );
			
			
			
			$query = $this->db->get($table); 
			
			return $query->result(); 
			
		}
		
		
		
		function count_records( $table,  $where_array ){
			
			$this->db->select('id');
			$this->db->from($table);
			foreach( $where_array as $field => $value ){
				$this->db->where($field, $value);
			}
				
			$query = $this->db->get();
			
			return $query->num_rows();
		}
		
		
		
		function check_if_exist( $table, $where_array ){
			
			$this->db->select('id');
			$this->db->from($table);
			foreach( $where_array as $field => $value ){
		
				$this->db->where($field, $value);
			}
			
		  
			$query = $this->db->get();
		
			
			if( $query->num_rows() ){
				return TRUE;
			}else{
				return FALSE;
			};
		}
		
		
		
		function get_primary_key ($table, $where_field, $value){
			
			$this->db->select('id');
			$this->db->from($table);
			$this->db->where($where_field, $value);
			
			$query = $this->db->get();
			
			if( $query->num_rows() ){
				return $query->row(0)->id;
			}else{
				return FALSE;
			};
		
		}
		
		
		
		function get_primary_key_from_where_array($where_array, $table){
		
			$this->db->select('id');
			$this->db->from($table);
			foreach( $where_array as $field => $value ){
				$this->db->where($field, $value);
			}
				
			$query = $this->db->get();
			
			if( $query->num_rows() ){
				return $query->row(0)->id;
			}else{
				return FALSE;
			};
			
		}
				 
		
		function get_last_ten_entries(){
			
		    $query = $this->db->get('users', 100 );
		    return $query->result();        
		
		}
		
		
		function object_to_array($data){
		  if(is_array($data) || is_object($data)){
		    $result = array(); 
		    foreach($data as $key => $value)
		    { 
		      $result[$key] = $this->object_to_array($value); 
		    }
		    return $result;
		  }
		  return $data;
		}
		
		
		function html2json( $str ){
		
			$str = htmlspecialchars($str, ENT_QUOTES);
			$str = nl2br($str);
			$str = str_replace("&lt;br&gt;", "", $str);
			$str = preg_replace("#\n#", "\\\n", $str);
			return $str;
		}
        
    
}