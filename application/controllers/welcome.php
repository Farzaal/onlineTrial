<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('Appmodel');
        $this->load->helper(array('form', 'url','download','file'));
        $this->load->library('form_validation');
        $this->load->library('zip');
    }

	public function index($msg = "")
	{
		$this->load->view('header');
		$this->load->view('onlineLogin',["msg"=>$msg]);
		$this->load->view('footer');
	}

	public function checkLogin(){

	$msg = "";
	$this->form_validation->set_rules('InvoiceNum', 'Invoice number', 'required');
	$this->form_validation->set_rules('accessCode', 'Access Code', 'required');

		if($this->form_validation->run() == False){
			$this->index();
		}else{
			$invoice = $this->input->post('InvoiceNum');
			$accessCode = $this->input->post('accessCode');
			$patInfo = $this->Appmodel->AuthLogin($invoice,$accessCode);
			
			if($patInfo > 0){
				$this->session->set_userdata('invoice_no', $invoice);
				$this->session->set_userdata('access_code', $accessCode);

				$Insert = array(
					'INVOICE_NO' => $invoice,
					'ACCESS_CODE' => $accessCode
				);
				$this->downloadReportView($msg);
			}else{
				$this->index($msg = "Invalid Login");
			}
		}
	}

	public function downloadReport(){

		$invoice = $this->session->userdata('invoice_no');
		$access = $this->session->userdata('access_code'); 
		$retrievePath = $this->Appmodel->ZipFiles($invoice,$access);
		
		for($i = 0; $i < count($retrievePath); $i++){

			$path = $retrievePath[$i]->PDF_SERVER.$retrievePath[$i]->PDF_FILE_PATH.$retrievePath[$i]->PDF_FILE_NAME;

			if(file_exists($path)){
				$this->zip->add_data($retrievePath[$i]->PDF_FILE_NAME, $path);
			} 
		}
		$this->zip->download('reports.zip');
	}

	public function singleDownload(){

		$msg = "";
		$orderId = $this->input->get('order');
		//$accessCode = $this->session->userdata('access_code');
		//$retrievePath = $this->Appmodel->retrievePath($orderId,$accessCode);
		//$path = $retrievePath[0]->PDF_SERVER.$retrievePath[0]->PDF_FILE_PATH.$retrievePath[0]->PDF_FILE_NAME;
		
		$path = "\\\\10.10.12.8\\PACS_SERVER\\09-10-2017\\038001170027661-1\\038001170027661-1.PDF";
		//print_r($path);
		//echo "<br/>";
		if (file_exists($path)) {
			
			//$fileName = $retrievePath[0]->PDF_FILE_NAME;
			$fileName = '038001170027661-1.PDF';
			$data = file_get_contents($path);
			force_download($fileName, $data);  

		}else if(!file_exists($path)){
			
			$msg = "Not Found. Kindly Enter your Email. Report will be sent to you via an Email <button class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Enter Email</button>";
			$this->downloadReportView($msg);
		}
	}

	public function downloadReportView($msg = ''){

		if(!empty($this->session->userdata('invoice_no'))){

		$accessCode = $this->session->userdata('access_code');

		$pat = $this->Appmodel->patInfo($accessCode);
				$patient = array(
					"PATIENT_ID" => $pat[0]->PATIENT_ID,
					"PATIENT_NAME" => $pat[0]->PATIENT_NAME,
					"ORDER_DATE" => $pat[0]->ORDER_DATE
				);
				//print_r($patient);		

		$cpt = $this->Appmodel->cptInfo($accessCode);

		$this->load->view('header');
		$this->load->view('downloadReport',['msg' =>$msg,'cpts'=>$cpt,'pat'=>$patient]);
		$this->load->view('footer');

		}else{
			$msg = "Kindly Login To Proceed";
			$this->index($msg);
		}
	}

	public function logOut(){

			$this->session->unset_userdata('invoice_no');
			$this->session->unset_userdata('access_code');

			$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
			$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
			$this->output->set_header('Pragma: no-cache');
			$this->index();
	}

	public function missingReport(){
		
		$email = $this->input->post('email');
		$status = $this->Appmodel->UpdateEmail($email,$this->session->userdata('patient_id'));
		if ($status == 1) {
			echo "updated";
		}
	}
}		   	

