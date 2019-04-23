<?php

include('leagueAPI/autoload.php');

use leagueAPI\API;
use DataDragonApi\DataDragonApi;

$api = new Api('RGAPI-b7724c7e-db26-484a-b3dc-4ccd58afa363');
$api->setRegion('eune');
$dataDragon = new DataDragonApi();
$dataDragon->initByCdn();


$summonerObject = $api->summoner();
$leagueObject = $api->league();
$matchObject = $api->match();

$summoner = $summonerObject->getInfo("FNC Kuka")[0];
$league = $leagueObject->getLeagueForSummoner($summoner->id);
$matchLists = $matchObject->getMatchlistByAccountID($summoner->accountId);

//var_dump($matchLists);
var_dump($matchObject->getMatchByID($matchLists->matches[0]["gameId"]));



?>
