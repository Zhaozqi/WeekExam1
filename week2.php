<?php 
	
	//1传入n与m两个数
	function boys($n,$m){
		$boys = range(1,$n);
		$i=0;
		$arr=[];
		$k=0;
		while (count($boys)>1) {
			if(!isset($boys[$i])){
				$boys=$arr;
				$arr=[];
				$i=0;
			}
			$k++;
			if($k==$m){
				unset($boys[$i]);
				$k=0;
			}else{
				$arr[]=$boys[$i];
			}
			$i++;
		}
		print_r($arr);
	} 
	// boys(6,3);

	//2三组数组 值相近
	function group1($arr){
		rsort($arr);
		$array=[];
		$array=[
			[array_unshift($array,$arr[0])],
			[array_unshift($array,$arr[1])],
			[array_unshift($array,$arr[2])],
		];
		for ($i=0; $i <count($arr) ; $i++) { 
			$array[2][]=$arr[$i];
			$sum = array_sum($array[2]);

			if($sum>array_sum($array[0])){
				$array=[
					$array[2],
					$array[0],
					$array[1],
				];
			}elseif($sum>array_sum($array[1])){
				$array=[
					$array[0],
					$array[1],
					$array[2],
				];
			}
		}
		print_r($array);
	}
	// group1([11,58,68,12,78,32,14,57,68]);

	//3返回组成最大值
	function getMax($arr,$pow=0){
		static $return = [];

		$t = [];
		for ($i=0; $i <10 ; $i++) { 
			$t[]=[];
		}
		$tt=[];

		for ($k=0; $k <count($arr) ; $k++) { 
			$index = (string)$arr[$k];
			if(isset($index[$pow])){
				$t[$index[$pow]][]=$arr[$k];
			}else{
				$tt[$index[$pow-1]][]=$arr[$k];
			}
		}

		for ($j=0; $j < count($arr); $j++) { 
			if(isset($t[$j])){
				$t[$j]=$return;
			}else{
				getMax($tt[$j],$pow+1);
			}

			if(isset($tt[$j])){
				$return = array_merge($return,$tt[$j]);
			}

		}
		return $return;
	}
	// getMax([9,98,45,12,75,65]);

	function bank($dao_time,$xu_time){
		$windows = [];
		$number = count($dao_time);
		$wait_time = 0;
		for ($i=0; $i <$number ; $i++) { 
			if(count($number)>4){
				$windows[] = $dao_time[$i]+$xu_time[$i];
				continue;
			}
			sort($windows);
			$bey_user = array_shift($windows);
			if($bey_user>$xu_time){
				$wait_time += $bey_user-$xu_time[$i];

				$now_user_time = $bey_user + $dao_time[$i];
			}else{
				$now_user_time = $dao_time[$i]+$xu_time[$i];
			}
			$windows = $now_user_time;
		}
		return $number/$now_user_time;
	}
	// echo bank([9.01, 9.10, 9.20, 9.21, 9.22],[0.30, 0.18, 0.22, 0.47, 0.11]);

	class DB{
		private $ins;
		private $getIns;

		private static function __CONSTRUCTOR(){
			$pdo = new PDO('mysql:host=127.0.0.1;dbname=1607a;charset=utf8','root','root');

		}

		public function clone(){

		}

		function create($sql){
			return $db->exec($sql);
		}
		function select($sql){
			return $db->exec($sql)->fetchAll();
		}
		function find($sql){
			return $db->exec($sql)->fetch();
		}
		function delete($sql){
			return $db->exec($sql);
		}
		function updage($sql){
			return $db->exec($sql);
		}

		
	}

 ?>