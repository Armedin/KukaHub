<?php

  namespace leagueAPI\API;


  class Match extends AbstractApi{

    /**
    * Get the matchlist of a summoner by encryptedAccountID
     *@param string $encrypted_account_id
  	 * @param int $queue
  	 * @param int $season
  	 * @param int $champion
  	 * @param int $beginTime
  	 * @param int $endTime
  	 * @param int $beginIndex
  	 * @param int $endIndex
    */
    public function getMatchlistByAccountID($encrypted_account_id, $queue = null, $season = null, $champion = null, int $beginTime = null, int $endTime = null, int $beginIndex = null, int $endIndex = null ){
      $this->setEndpoint("/lol/match/" . self::RESOURCE_LEAGUE_VERSION . "/matchlists/by-account/{$encrypted_account_id}")
      ->addQueryParam('queue', $queue)
			->addQueryParam('season', $season)
			->addQueryParam('champion', $champion)
			->addQueryParam('beginTime', $beginTime)
			->addQueryParam('endTime', $endTime)
			->addQueryParam('beginIndex', 0)
			->addQueryParam('endIndex', 10);
      return (object)$this->makeRequest();
    }


    /**
    * Get the match by matchId
    *
    *@param string $matchID
    */
    public function getMatchByID($matchID){
      $this->setEndpoint("/lol/match/" . self::RESOURCE_LEAGUE_VERSION . "/matches/{$matchID}");
      return (object) $this->makeRequest();
    }


  }


 ?>
