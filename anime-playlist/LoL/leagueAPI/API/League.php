<?php

  namespace leagueAPI\API;


  class League extends AbstractApi{

    /**
    *
    *
    */
    public function getLeagueForSummoner($enc_summ_id){
      $summoners = [];
      $this->setEndpoint("/lol/league/" . self::RESOURCE_LEAGUE_VERSION . "/positions/by-summoner/{$enc_summ_id}");
      //var_dump($this->makeRequest()[0]);  For some reason, it returns an array inside another array ._.
      array_push($summoners,(object)$this->makeRequest()[0]); //Turn array to object. Look at DTO for better res!
      return $summoners;
    }



    /**
    * Returns the url of the summoner rank image
    *
    *@param $summoner_rank
    */
    public function getLeagueRankImage($summoner_rank){
      $romans = array(
        'I' =>1,
        'II' =>2,
        'III' =>3,
        'IV' =>4,
        'V' =>5,
      );
      $rank = explode(" ",$summoner_rank);
      foreach ($romans as $key => $value) { //Simple conversion
        if($rank[1] == $key){
          $rank[1] = $value;
          break;
        }
      }
      return 'img/ranks/'.strtolower($rank[0]).'_'.$rank[1].'.png';
    }




  }


 ?>
