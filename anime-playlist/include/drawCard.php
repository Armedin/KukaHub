<?php
	include 'cardModule.php';
	include '../../include/init_constantFunctions.php';

	if(isset($_GET['action']) && $_GET['action'] == "draw-card"
	&& is_ajax()
	&& isset($_POST['choiseIndex'])
	&& isset($_POST['username'])
	&& isset($_POST['user_id'])
	&& !empty($_POST['user_id'])
	&& !empty($_POST['username'])
	&& !empty($_POST['token'])
	&& !empty($_POST['token']))
	{

	$user_id = db_escapeString($_POST['user_id']);
  $token = db_escapeString($_POST['token']);
  $username = db_escapeString($_POST['username']);
	if($user_id == getSessionUser_id()){
		if($token == getToken($user_id)){

			$timeStamp = time();
			$DateCheck = true;
			$choiseIndex = intval(db_escapeString($_POST['choiseIndex']));

			$userDB = db_query("SELECT * FROM card_game WHERE user_id = '$user_id'");
			$userDBInfo = mysqli_fetch_assoc($userDB);

			//Calculate Time
			if($userDBInfo){
				$preTime = intval($userDBInfo['timeStamp']);
				$preTimeDate =  date("Ymd", $preTime);
				$nowTimeDate = date("Ymd", $timeStamp);

				if($preTimeDate==$nowTimeDate){ //Within a day!

					// $originToday = $userDBInfo['todayCount'];
					// $canGetCardChance = $canGetCardChance + $canGetCardChancePlus;
					// $leftGetChance = $canGetCardChance - $originToday;
					$chancesLeft = 0;
					if($chancesLeft<=0){
						$DateCheck = false;
					}
				}else{
					// $leftGetChance = $canGetCardChance+$canGetCardChancePlus;
					// $query = "Update ".DB_PREFIX."wm_card set todayCount=0 where email=".$comment_author_email."";
					// $result=$DB->query($query);
				}
			}

			if(!$DateCheck){

				//Get Randon Card
				$randomCardID = null;
				$cardChoiseList = array();
				$testCount = 0;
				while (count($cardChoiseList)<3 && $testCount<100) { // 3 cards to choose from!
					$randomCardR = mt_rand(1, 100);
					$randomCardIDArrContent = createCardId($randomCardR); //get Card ID
					array_push($cardChoiseList,$randomCardIDArrContent);
					$testCount = $testCount +1;
					$cardChoiseList = array_values(array_unique($cardChoiseList,SORT_REGULAR));
				}

				if(!($choiseIndex>=0&&$choiseIndex<=2)){ //Just in case the user changes choiseIndex
					$choiseIndex = 1;
				}
				$randomCardID = $cardChoiseList[$choiseIndex];

				if(empty($randomCardID)){
					$data = json_encode(array('code'=>"4"));
				}else{
					$cards = json_decode(file_get_contents('cardData.json'), true);
					$selectedCard = $cards['cardData'][$randomCardID];

					if(!$userDBInfo){
						$sql=db_query("INSERT INTO card_game (user_id,cardsID,cardCount,timeStamp,score,level,exp)
						VALUES('$user_id','".$randomCardID."','1',".$timeStamp.",0,0,0)");
					}else{
						//update CardsID field
						$ownedCardsID = $userDBInfo['cardsID'];
						$totalCardsOwned = $userDBInfo['cardCount'];
						$updatedCardsList = addCard($ownedCardsID, $totalCardsOwned, $randomCardID);
						$query = db_query("UPDATE card_game SET cardsID='".$updatedCardsList['cardsIDText']."' , cardCount='".$updatedCardsList['cardsCountText']."' ,
						timeStamp=".$timeStamp." WHERE user_id='$user_id'");
					}
					$data = json_encode(array('code'=>"1", 'card' => $randomCardID,'cardChoiseList'=>$cardChoiseList, 'choiseIndex' =>$choiseIndex));
				}
			}else{ //No more chances of drawing
				$data = json_encode(array('code'=>"2"));
			}
		}else{
			$data = json_encode(array('code'=>"4"));
		}
	}else{
		$data = json_encode(array('code'=>"4"));
	}


	echo $data;

}
?>
