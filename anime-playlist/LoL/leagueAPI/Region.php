<?php

namespace leagueAPI;

class Region{

  /**
  * The Region object
  *
  *@param string
  */
  protected $region;


  /**
  * Regions names with their corresponding ids
  *
  *@param array
  */
  protected $allRegions = [
    'tr'   => 'TR1',
    'ru'   => 'RU',
    'kr'   => 'KR',
    'br'   => 'BR1',
    'oce'  => 'OC1',
    'jp'   => 'JP1',
    'na'   => 'NA1',
    'eune' => 'EUN1',
    'euw'  => 'EUW1',
    'lan'  => 'LA1',
    'las'  => 'LA2',
  ];

  /**
  *@param string $region
  */
  public function __construct($region){
    $this->region = strtolower($region);
  }

  /**
  *@return $region
  */
  public function getRegion(){
    return $this->region;
  }


  /**
  * Get the region's ID
  *
  *@param string
  */
  public function getRegionID(){
    if (array_key_exists($this->region, $this->allRegions)) {
      return $this->allRegions[$this->region];
    } else {
      return strtoupper($this->region);
    }
  }
  

  /**
  * Check whether regions are locked
  *
  *@param $regions
  *
  *@return boolean
  */

  public function isLocked($regions){

    if(count($regions) == 0){ //No regions locked
      return false;
    }

    foreach($regions as $region){
      if($this->region == strtolower($region)){
        return true;
      }
    }

    return false;

  }




}




 ?>
