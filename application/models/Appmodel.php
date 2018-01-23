<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appmodel extends CI_MODEL {

	public function AuthLogin($invoiceNo,$accessCode){

	$q = $this->db->query("SELECT * FROM EMR.ONLINE_REPORTS  WHERE invoice_no = '$invoiceNo' AND access_code = '$accessCode'");
		if($q->num_rows() > 0){
			return 1;
		}else{
			return 0;
		}
	}

	public function patInfo($accessCode){

		$q = $this->db->query("select * from EMR.online_reports WHERE access_code = '$accessCode'");
		return $q->result();

	}

	public function cptInfo($accessCode){

		$q = $this->db->query("SELECT  * FROM EMR.online_reports d,
		EMR.definition_type_detail dd WHERE d.order_status_id = dd.id and access_code = '$accessCode'");
		return $q->result();
	}

	public function retrievePath($orderId,$accessCode){

		$query = $this->db->query("SELECT * FROM EMR.ONLINE_REPORTS WHERE ACCESS_CODE = '$accessCode' AND ORDER_DETAIL_ID = '$orderId'");
	
		return $query->result(); 
	}

	public function InsertCredentials($table,$Insert){

		//$insert = $this->db->insert($table, $Insert);
	}

	public function checkEmailQueue($pat_id,$order_id){

		$query = $this->db->query("SELECT * FROM EMR.EMAIL_QUEUE WHERE PATIENT_ID = '$pat_id' AND ORDER_DETAIL_ID = '$order_id'");
		if($query->num_rows() > 0){
			return 1;
		}else{
			return 0;
		}
	}

	public function ZipFiles($invoiceNo,$accessCode){

		$q = $this->db->query("SELECT * FROM EMR.ONLINE_REPORTS  WHERE invoice_no = '$invoiceNo' AND access_code = '$accessCode'");
		return $q->result();
	}

/*	public function EmailQueue($data){

		$patId = $data['PATIENT_ID'];
		$comp_order = $data['COMPLETE_ORDER_NO'];
		$order = $data['ORDER_DETAIL_ID'];
		$rptName = $data['REPORT_NAME'];
		$filepath = $data['PDF_FILE_PATH'];
		$filename = $data['PDF_FILE_NAME'];

		$q = $this->db->query("INSERT INTO EMR.EMAIL_QUEUE
(PATIENT_ID,
COMPLETE_ORDER_NO,
ORDER_DETAIL_ID,
REPORT_NAME,
EMAIL_TO,
PDF_FILE_PATH,
PDF_FILE_NAME,
EMAIL_SUBJECT,
EMAIL_HEADER,
REQUESTED_BY,
REQUESTED_TERMINAL,
EMAIL_DATE,
EMAIL_TERMINAL,
LOCATION_ID,
REMARKS,
ID)
VALUES('$patId','$comp_order','$order','$rptName','farzalkhan786@gmail.com','$filepath','$filename','subject','header','admin','PLC','','01','001','HELLOO','778')");

		if($q){
			return 1;
		}else{
			return 0;
		}
		
	}*/

/*	public function UpdateEmail($email,$patId){

		$q = $this->db->query("UPDATE EMR.EMAIL_QUEUE SET EMAIL_TO = '$email' WHERE PATIENT_ID = '$patId'");
		if($q){
			return 1;
		}else{
			return 0;
		}
	}*/
}





