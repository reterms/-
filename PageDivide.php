<?php
class PageDivide {
	private $totalRecordNum;
	private $pageRecordNum;
	private $totalPage;
	private $currentPage;
	private $url;
	private $mysqli;
	
	function __construct($totalReciordQuery,$pageRecordNum,$url) {
		//初始化总记录数
		require 'db_config.php';
		$this->mysqli = $mysqli;
		$result = $mysqli->query($totalReciordQuery);
		$row = $result->fetch_array(MYSQLI_NUM);
		$this->totalRecordNum = $row[0];
		//每页显示多少记录
		$this->pageRecordNum = $pageRecordNum;
		//总页数
		$this->totalPage = ceil($this->totalRecordNum/$this->pageRecordNum);
		//当前页
		if (isset ( $_REQUEST ['page'] )) {
			$page = $_REQUEST ['page'];
		} else {
			$page = 1;
		}
		$this->currentPage =  $page;
		//url
		$this->url = $url;
	}
	
	public function query($dataQuery){
		$result = null;
		$startRecord = ($this->currentPage-1)*$this->pageRecordNum;
		$query = $dataQuery." limit $startRecord,{$this->pageRecordNum}";
		$result = $this->mysqli->query($query);
		return $result;
	}
	
	//首页
	public function first(){
		if($this->currentPage==1){
			return "&nbsp;&nbsp;首页&nbsp;&nbsp;";
		}else{
			$url = $this->url."?page=1";
			return "&nbsp;&nbsp;<a href='$url'>首页</a>&nbsp;&nbsp;";
		}
	}
	//前一页
	public function prev(){
		$prev = $this->currentPage -1;
		if($prev<1){
			return "&nbsp;&nbsp;前一页&nbsp;&nbsp;";
		}else{
			$url = $this->url."?page=$prev";
			return "&nbsp;&nbsp;<a href='$url'>前一页</a>&nbsp;&nbsp;";
		}
	}
	//中间页
	public function middle(){
		$start = max($this->currentPage -5,1);
		$end = min($this->currentPage +5,$this->totalPage);
		$html = '';
		for($i=$start;$i<=$end;$i++){
			if($i==$this->currentPage){
				$html .= "&nbsp;&nbsp;$i&nbsp;&nbsp;";
			}else{
				$url = $this->url."?page=$i";
				$html .=  "&nbsp;&nbsp;<a href='$url'>$i</a>&nbsp;&nbsp;";
			}
		}
		return $html;
	}
	
	//下一页
	public function next(){
		$next = $this->currentPage +1;
		if($next>$this->totalPage){
			return "&nbsp;&nbsp;下一页&nbsp;&nbsp;";
		}else{
			$url = $this->url."?page=$next";
			return "&nbsp;&nbsp;<a href='$url'>下一页</a>&nbsp;&nbsp;";
		}
	}
	//末页
	public function end(){
		if($this->currentPage==$this->totalPage){
			return "&nbsp;&nbsp;末页&nbsp;&nbsp;";
		}else{
			$url = $this->url."?page={$this->totalPage}";
			return "&nbsp;&nbsp;<a href='$url'>末页</a>&nbsp;&nbsp;";
		}
	}
	public function echoPageControl(){
		$html = "<br/>总记录数：{$this->totalRecordNum}，每页显示条记录:{$this->pageRecordNum}，当前页 {$this->currentPage}/{$this->totalPage}<br/><br/>";
		$html .= $this->first();
		$html .= $this->prev();
		$html .= $this->middle();
		$html .= $this->next();
		$html .= $this->end();
		echo $html;
	}
}

?>