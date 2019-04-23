<?php

function createCardId($randomCardRate){
    $randomCardID = null;
    if($randomCardRate>=1&&$randomCardRate<=64){
        //N
        $randomCardN_ = mt_rand(1, 97);
        $randomCardID = '0'.sprintf("%03d", $randomCardN_);
    }else if($randomCardRate>=65&&$randomCardRate<=86){
        //R
        $randomCardR_ = mt_rand(1, 81);
        $randomCardID = '1'.sprintf("%03d", $randomCardR_);
    }else if($randomCardRate>=87&&$randomCardRate<=97){
        //SR
        $randomCardSR_ = mt_rand(1, 60);
        $randomCardID = '2'.sprintf("%03d", $randomCardSR_);
    }else if($randomCardRate>97){
        //SSR
        $randomCardSSR_ = mt_rand(1, 34);
        $randomCardID = '3'.sprintf("%03d", $randomCardSSR_);
    }
    return $randomCardID;
}

function addCard($ownedCardsID, $totalCardsOwned, $randomCardID){

  $ownedCardsIDList = explode(",",$ownedCardsID);
  $ownedCardsCountArr = explode(",",$totalCardsOwned);
  $repeatedCards = false;
  for ($i=0; $i<count($ownedCardsIDList); $i++)
  {
      if(intval($ownedCardsIDList[$i])==intval($randomCardID)){
          $ownedCardsCountArr[$i] = intval($ownedCardsCountArr[$i])+1;
          $repeatedCards = true;
          break;
      }
  }
  $cardsIDText = '';
  $cardsCountText = '';
  if($repeatedCards){
      $cardsIDText = $ownedCardsID;
      $cardsCountText = implode(",",$ownedCardsCountArr);
  }else{
      $cardsIDText = $ownedCardsID.",".$randomCardID;
      $cardsCountText = $totalCardsOwned.",1";
  }
  $callBackCardInfo = array('cardsIDText'=>$cardsIDText,'cardsCountText'=>$cardsCountText);
  return $callBackCardInfo;
}

?>
