<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Deck problem</title>
	<link rel="stylesheet" type="text/css" href="./css/cards.css" media="screen" />
    <!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="./css/cards-ie.css" media="screen" />
    <![endif]-->
    <!--[if IE 9]>
        <link rel="stylesheet" type="text/css" href="./css/cards-ie9.css" media="screen" />
    <![endif]-->
</head>
<body>
	<form name="playing_cards" method="post" action="">
	<table>
		<tr>
			<td>Number of Persons Playing</td>
			<td>
				<select name="person_num">
					<?php
						for($i=2; $i<5;++$i){
							echo '<option value="',$i,'"',(isset($person_num) && $person_num == $i ? ' selected ' : ''),'>',$i,'</option>';
						}
					?>
				</select>
				</td>
		</tr>
		
		<tr>
			<td>Number of cards to Distribute</td>
			<td>
				<select name="cards_person">
					<?php
						for($i=2; $i<14;++$i){
							echo '<option value="',$i,'"',((isset($cards_person) && $cards_person == $i) ? ' selected ' : ''),'>',$i,'</option>';
						}
					?>
				</select>
				</td>
		</tr>
		
		<tr>
			<td align="center"><input type="submit" value="submit"></td>
			<td align="center"><input type="reset" value="reset"></td>
		</tr>
	</table>
	</form>
	<div class="playingCards fourColours rotateHand">
	<div class="clear"></div>
	<?php
		for($i = 0; $i<$person_num; ++$i){
			echo '<div class="playerContainer">
				<h3>In Player - ', $i+1,'</h3>
				<ul class="hand">';
				for($j = 0; $j<$cards_person; ++$j){
					$card = $p[$i]->pop();
					$card_type = key($card);
					$card_vale = is_int($card[$card_type]) ? $card[$card_type]: strtoupper($card[$card_type]);
					echo '<li><a class="card rank-',$card_vale,' ',$card_symb[$card_type],'" href="#">
								<span class="rank">',$card_vale,'</span>
								<span class="suit">&',$card_symb[$card_type],';</span>
								</a></li>';
				}//End of for(;;)
			echo '</ul>
				</div>
				<div class="clear"></div>';
		}//End of for();;
		
		if($reserves != NULL){
		echo '<div class="playerContainer">
				<h3> Reserved Cards</h3>
				<ul class="hand">';
				for($j = 0; $j<$remaining_cards; ++$j){
					$card = $reserves->pop();
					$card_type = key($card);
					$card_vale = is_int($card[$card_type]) ? $card[$card_type]: strtoupper($card[$card_type]);
					echo '<li><a class="card rank-',$card_vale,' ',$card_symb[$card_type],'" href="#">
								<span class="rank">',$card_vale,'</span>
								<span class="suit">&',$card_symb[$card_type],';</span>
								</a></li>';
				}//End of for(;;)
			echo '</ul>
				</div>
				<div class="clear"></div>';
		}
	?>
	
	</div>
	<?php 
	//echo '<pre>',print_r($p[2]);
	?>
</body>
</html>