<?php 
    require_once 'config_db.php';

	class hy_database {
		/*
		变量
		 */
		private $connect;
		//建立数据库连接并打开数据库
		public function __construct() {
			global $connect;
			$connect = new mysqli(db_host,db_user,db_password,db_databasename);
			if(mysqli_connect_errno()){
				echo "fail";
			} 
			
			$connect->query("set names 'utf8'");
		}

		//添加记录
		public function sqlInsert($table_name,$record_values) {
			$key="";
	  		$value="";
	  		global $connect;
	  		for($i=0; $i<count($record_values); $i++){
		 		$key=$key.key($record_values);
		 		$value=$value.$record_values[key($record_values)];
		 		next($record_values);

		 		if($i < count($record_values)-1){
					$key=$key."," ;
					$value=$value.",";
		 		}
	  		}
			$sql_insert = "INSERT INTO ".$table_name."($key)"." "."VALUES"."($value)";
			$result = $connect->query($sql_insert);
			if ($result) {
				return "添加成功";
			} else {
				return "添加失败";
			}
		}

		//修改记录
		public function sqlUpdate($table_name, $primary_key, $update_values) {
			global $connect;
			$key = "";
			for($i=0; $i<count($update_values); $i++){
		 		$key=$key.key($update_values);
		 		// echo $key.'<br>';
		 		$value=$update_values[key($update_values)];

		 		next($update_values);

		 		if($i < count($update_values)-1){
					$key=$key."=".$value.",";
		 		} else {
		 			$key=$key."=".$value;
		 		}
	  		}
			$sql_update = "UPDATE ".$table_name." SET ".$key." WHERE goods_id='".$primary_key."'";
			$result = $connect->query($sql_update);

		}

		//根据主键查询一条记录
		public function sqlSelect($table_name, $primary_key) {
			global $connect;
			$sql_select = "SELECT * FROM ".$table_name." WHERE goods_id=".$primary_key;
			$result = $connect->query($sql_select);

			if ($result) {
				$assoc = $result->fetch_assoc();
				return $assoc;
			} else {
				return false;
			}
		}

		//查询所有记录
		public function sqlSelect_all($table_name,$page) {
			global $connect;
			//------------------
			$pageSize= 60;
			$maxRows;
			$maxPages;

			$sql = "SELECT count(*) FROM "."$table_name";
			$res_rows = $connect->query($sql);
			// $maxRows = $numrows->num_rows;
			if ($r=$res_rows->fetch_array()) {
				$maxRows = $r[0];
			} else {
				$maxRows=0;
			}

			$maxPages = ceil($maxRows / $pageSize);

			if ($page > $maxPages) {
				$page = $maxPages;
			}
			if ($page<1) {
				$page = 1;
			}

			$begin_id = ($page-1)*$pageSize;
			$limit = "LIMIT ".$begin_id.",".$pageSize;

			$page_arr = array(
				'current_page' => $page,
				'maxPages' => $maxPages,
				'maxRows' => $maxRows 
			);

			//------------------
			$sql_select_all = "SELECT * FROM ".$table_name." ORDER BY goods_id DESC ".$limit;
            $stmt = null;
		    if ($stmt = $connect->prepare($sql_select_all)) {
		        
		        /* execute statement */
		        $stmt->execute();
		        
                /* bind result variables */
		        $goods_id = null;
		        $goods_title = null;
		        $goods_keywords = null;
		        $goods_price = null;
		        $goods_coupon_price = null;
		        $goods_coupon_address = null;
		        $goods_address = null;
		        $goods_pic_path = null;
		        $goods_addtime = null;
		        $goods_source = null;
		        $goods_saleValume = null;
		        $goods_quan_surplus = null;
		        $goods_quan_receive = null;
		        $goods_quan_condition = null;
		        $goods_introduce = null;
                $stmt->bind_result($goods_id, $goods_title, $goods_keywords, $goods_price, $goods_coupon_price, $goods_coupon_address, $goods_address, $goods_pic_path, $goods_addtime, $goods_source, $goods_saleValume, $goods_quan_surplus, $goods_quan_receive, $goods_quan_condition, $goods_introduce);                         
                
                $res = array();
                $arr_value = array();
                $arr = array();
                while ($stmt->fetch()) {
                    $arr_value = array(
                    	"goods_id" => $goods_id,
                        "goods_title" => $goods_title, 
                        "goods_keywords" => $goods_keywords,
                        "goods_price" => $goods_price,
                        "goods_coupon_price" => $goods_coupon_price,
                        "goods_coupon_address" => $goods_coupon_address,
                        "goods_address" => $goods_address,
                        "goods_pic_path" => $goods_pic_path,
                        "goods_addtime" => $goods_addtime,
                        "goods_source" => $goods_source,
                        "goods_saleValume" => $goods_saleValume,
                        "goods_quan_surplus" => $goods_quan_surplus,
                        "goods_quan_receive" => $goods_quan_receive,
                        "goods_quan_condition" => $goods_quan_condition,
                        "goods_introduce" => $goods_introduce
                    );
                    $arr[] = $arr_value;
                }
                $res = array(
                	"data" => $arr,
                	'pages' => $page_arr
                );
                return $res;
              }
		}

		//删除记录
        public function sqlDelete($table_name, $primary_key) {
        	global $connect;
        	$sql_delete = "DELETE FROM ".$table_name." WHERE goods_id='".$primary_key."'";
        	$connect->query($sql_delete);
        }
		
		 public function __destruct(){
		    global $connect;
		    //关闭数据库连接
		    if ($connect) {
		        $connect->close();
		    }
		}
	}

 ?>