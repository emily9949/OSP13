<?php
require_once 'dto.php';

class Controller{
	private $action;
	private $myfile;
	private $view;
	private $data;

	public function __construct($action){
		$this->action = $action;
		$this->myfile = new MyFile();
	}

	public function run(){
		switch ($this->action){
			case "list":
				$this->flist();
				break;
			case "read":
				$this->read();
				break;
			case "writeForm":
				$this->writeForm();
				break;
			case "write":
				$this->write();
				return;
			case "check":
				$this->check();
				return;
			case "del":
				$this->del();
				return;
			case "download":
				$this->download();
				return;
		}
		require $this->view;
	}

	public function download(){
		$fname = $_GET['fname'];
		header("Content-Disposition:attachment; filename=".$fname);			//다운 받을 파일명 지정
		header("Content-type:application/octet-stream; name=".$fname);		//파일의 종류 지정
		$result = file_get_contents("contents/".$fname);					//다운 받을 파일경로 지정
		print $result;
	}

	public function flist(){
		$this->data = $this->myfile->flist(1);
		$this->view = "list.php";
	}
	public function read(){
		$this->myfile->setFileName($_GET['fname']);
		$this->myfile->read();
		$this->view = "read.php";
	}
	public function write(){
		$this->myfile->setFileName($_POST['fname'].".txt");
		$this->myfile->setContent($_POST['content']);
		$this->myfile->setTag($_POST['tag']);
		$this->myfile->write();
		$this->action = "list";
		$this->run();
	}

	public function del(){
		$this->myfile->setFileName($_GET['fname']);
		$this->myfile->delete();
		$this->action = "list";
		$this->run();
	}
	
	public function writeForm(){
		$this->data = $this->myfile->flist(2);
		$this->view = "write.php";
	}
}
?>
