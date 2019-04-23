<?php

  namespace leagueAPI\API;


  class Summoner extends AbstractApi{



    /**  !!!! // TODO
    * Get the information of a user(s) corresponding
    * to the given ID(s)
    *
    * @param array $IDs
    *
    * @throws MaxIDListException
    *
    * @return SummonerInfo
    */
    public function getInfoByIDs($IDs){

      if(count($IDs)>20){
        throw new MaxIDListException('This request can only support a maximum of 20 entities, '. count($IDs) . ' were given!');
      }
      // foreach($IDs as $id){
      //   $this->setEndpoint("/lol/summoner/" . self::RESOURCE_SUMMONER_VERSION . "/summoners/{$id}");
      // }

    }

    /**
    * Get the information of a user(s) corresponding
    * to the given Summoner name(s)
    *
    * @param array $names
    *
    * @throws MaxIDListException
    *
    * @return SummonerInfo
    */
    public function getInfoByNames($names){

      if(count($names)>20){
        throw new MaxIDListException('This request can only support a maximum of 20 entities, '. count($names) . ' were given!');
      }
      $summoners = [];
      foreach($names as $name){
        $name = rawurlencode($name);
        $this->setEndpoint("/lol/summoner/" . self::RESOURCE_SUMMONER_VERSION . "/summoners/by-name/{$name}");
        array_push($summoners,(object)$this->makeRequest()); //Turn array to object. Look at DTO for better res!
      }
      return $summoners;
    }





    /**
    * Get the information of a user(s) corresponding
    * to the given ID(s) which can be an either integer
    * or a name.
    *
    * @param array $ID
    *
    * @return null
    */
    public function getInfo($IDs){

      $idArray = array();
      $namesArray = array();

      if(is_array($IDs)){
        foreach($IDs as $identity){
          if(preg_match('/^\d+$/',$identity)){ //If it's an integer (summoner ID)
            array_push($idArray, $identity);
          }else{
            array_push($namesArray,$identity);
          }
        }
      }else{
        if(preg_match('/^\d+$/',$IDs)){
          //Singe summoner ID
          array_push($idArray, $IDs);
        }else{
          //Singe summoner name
          array_push($namesArray,$IDs);
        }
      }

      if(count($idArray)>0){
        $idArray = $this->getInfoByIDs($idArray);
      }
      if(count($namesArray)>0){
        $namesArray = $this->getInfoByNames($namesArray);
      }

      //var_dump($namesArray);
      return $namesArray;
    }




  }


 ?>
