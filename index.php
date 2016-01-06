<?php
/*
* Todo: To create a dynamic deck and distribute among the players using any Datastructures.
* DataStructure: Stack --> ReadingCards.php
* Logic: Dynamically creating no. of players and no. of cards to be distributed among them with reserves which is not distributed. After creation we radam pick each card and assign to players
* Programmer: Rajkumar Madishetti
* TypeOfWork: Assignment
*/

	/* ** Include Files ** */
	require_once('./common/deck-functions.php');
	require_once('./class/ReadingCards.cls.php');//Cards per Person using Stack program 
	
	/* ** Default Values ** */
	$to_print = 'This is default one'; //To display in the page
	$card_type = Array('Heart', 'Spade', 'Diamond', 'Club'); //Card Type
	$card_symb = Array('Heart' => 'hearts;', 'Spade' => 'spades', 'Diamond' => 'diams', 'Club' => 'clubs');
	$card_numbers = Array('A','2','3','4','5','6','7','8','9','10','j','q','k');// Card Values
	$person_num = 3; //Playing persons
	$cards_person = 13; //Number of cards to be distributed to a person
	$cards_arr = Array();// Initial Array before distributing
	$person_cards = Array();  //Multi-dimensional array for 4 persons
	$i = 0; //Temporary values for loops
	
	if(isset($_REQUEST)){
		//The values set by the User
		extract($_REQUEST);
	}
	
	/* ** Main Logic ** */	
	$cards_type_len = count($card_type);
	$cards_numbers_len = count($card_numbers);
	$total_cards = $cards_type_len * $cards_numbers_len; //Total Number of Cards Present for distributing
	$total_cards_distribute = $person_num * $cards_person;
		
	//Create cards
	$cards_arr = createCards();
	$cards_len = count($cards_arr);
	//$cards_arr['Club'][13] = Array('K'=> Array(0=>Array(4, 6, 8),1,2)); //Checking if multi-dimensional 	
	$cards_arr = shuffleDeck($cards_arr);//Double shuffling so that no Arithmetic predictions
	$reserves = NULL;
	
	//Dynamically creating the persons
	for(; $i<$person_num;){//Pre-increment is faster than Post-increment in PHP	
		$p[$i] = new ReadingCards($cards_person);//Creating the no. of required persons dynamically on fly as per mentioned
		//For last distribution if it only meant for last person then no jumbling simple assign
		distributeCards($p[$i] , (bool) (++$i == $person_num && $total_cards == $total_cards_distribute));
	}
	
	//For extra cards we would be pushing it into reserves
	if($total_cards != $total_cards_distribute){
		$remaining_cards = $total_cards - $total_cards_distribute;
		$reserves = new ReadingCards($remaining_cards); //Left out cards
		distributeCards($reserves, true);//Assigning remaining cards directly to Reserves
	}
	
	require_once('./templates/display.tpl.php');