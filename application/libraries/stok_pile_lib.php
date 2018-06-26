<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stok_pile_lib{
	function generateArrayStokPile(){
		$CI =& get_instance();
		loadModel("stok_pile_mod");
		$rowPile = $CI->stok_pile_mod->getData("where isnull(`PID`)");
		$rowPile = $rowPile->result_array();
		$listRow = array();
		foreach ($rowPile as $rowMaster){
			$rowPileDetail = $CI->stok_pile_mod->getData("where `PID`=".$rowMaster["ID"]);
			$rowPileDetail = $rowPileDetail->result_array();
			$rowSub = array();
			foreach ($rowPileDetail as $rowDetail){
				$rowSub[] = array(
					"ID" => $rowDetail["ID"],
					"PID" => $rowDetail["PID"],
					"Label" => $rowDetail["Label"],
					"Value" => $rowDetail["Value"]
				);
			}
			
			$listRow[] = array(
				"Label" => $rowMaster["Label"],
				"subDetail" => $rowSub
			);
		}
		
		return $listRow;
	}
}