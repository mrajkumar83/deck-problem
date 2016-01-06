<?php

function createCards(){
	
	global $cards_type_len, $card_type, $card_numbers, $cards_numbers_len;
	$cards_arr = Array();
	
	for($i=0; $i < $cards_type_len; ++$i){//Post-increment is faster than Pre-increment in PHP
		//array_push($cards_arr, $card_type[$i]);
		for($j=0; $j < $cards_numbers_len; ++$j){
			$cards_arr[$card_type[$i]][] = $card_numbers[$j];
		}
	}
	return $cards_arr;
}

function shuffleDeck($list) { 
  if (!is_array($list)) return $list; 

  $keys = array_keys($list); 
  shuffle($keys); 
  $random = array(); 
  
  foreach ($keys as $key){	  
	 
	 /* 
	  //For recursive repeating the array when there are so many arrays interlinked.
	  $temp = $list[$key];
	  
	  if(is_array($temp)){
		  shuffle($temp);
		  foreach($temp as $k => $v){
			  $random[$key][] = (is_array($temp[$k])) ? shuffleDeck($temp[$k]) : $temp[$k];
			}
	  }else{
		  $random[$key] = $temp; 
	  }
	 */ 
	 
	//As there is only 2 level array  
	$temp = $list[$key];
    $random[$key] = $list[$key]; 
  }
  return $random; 
}


function distributeCards($obj, $bool){
	global $cards_arr, $card_type, $cards_len, $cards_person;
	$arr = Array();
	
	//Directly inserting to the Last Object[Person/Reserves]
	if($bool){
		foreach($cards_arr as $type=>$list){
			foreach($list as $key=>$val)
				$obj->push(Array($type => $val));
		}
		unset($cards_arr);
	}else{
		for($i=0; $i < $cards_person; ++$i){
			$sel_card_type_val = array_rand($card_type, 1);
			$sel_card_type = $card_type[$sel_card_type_val];
			$sel_card_list = $cards_arr[$sel_card_type];			
			$sel_card_count = count($sel_card_list);
			
			if($sel_card_count <= 1)
			{
				unset($card_type[$sel_card_type_val]);
			}
			$sel_card_index = rand(0, $sel_card_count-1);
			$sel_card_val = $sel_card_list[$sel_card_index];
			
			$obj->push(Array($sel_card_type => $sel_card_val));
			unset($cards_arr[$sel_card_type][$sel_card_index]);
			$cards_arr[$sel_card_type] = array_values($cards_arr[$sel_card_type]);
				
		}//End of for(;;)
		 
	}//End of if-else{}
	
}
