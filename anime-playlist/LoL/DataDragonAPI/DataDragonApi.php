<?php

namespace DataDragonApi;


  class DataDragonApi
  {


    //Constants
    const
        SET_ENDPOINT              = 'datadragon-cdn',
        SET_VERSION               = 'ver',
        SET_CUSTOM_IMG_ATTRS      = 'custom-attrs',
        SET_DEFAULT               = 'class-default',
        SET_PROFILE_ICON          = 'class-profile',
        SET_MASTERY_ICON          = 'class-mastery',
        SET_RUNE_ICON             = 'class-rune',
        SET_REFORGED_RUNE_ICON    = 'class-reforged-rune',
        SET_CHAMP_SPLASH          = 'class-champ_splash',
        SET_CHAMP_LOADING         = 'class-champ_loading',
        SET_CHAMP_ICON            = 'class-champ_icon',
        SET_SPRITE                = 'class-champ_icon_sprite',
        SET_SPELL_ICON            = 'class-spell',
        SET_ITEM_ICON             = 'class-item',
        SET_UI_ICON               = 'class-scoreboard',
        SET_MINIMAP               = 'class-minimap';


      protected $settings = [
    		self::SET_ENDPOINT            => 'https://ddragon.leagueoflegends.com/cdn/',
    		self::SET_DEFAULT             => 'dd-icon',
    		self::SET_PROFILE_ICON        => 'dd-icon-profile',
    		self::SET_MASTERY_ICON        => 'dd-icon-mastery',
    		self::SET_RUNE_ICON           => 'dd-icon-rune',
    		self::SET_REFORGED_RUNE_ICON  => 'dd-icon-reforged-rune',
    		self::SET_CHAMP_SPLASH        => 'dd-splash',
    		self::SET_CHAMP_LOADING       => 'dd-loading',
    		self::SET_CHAMP_ICON          => 'dd-icon-champ',
    		self::SET_SPRITE              => 'dd-sprite',
    		self::SET_SPELL_ICON          => 'dd-icon-spell',
    		self::SET_ITEM_ICON           => 'dd-icon-item',
    		self::SET_UI_ICON             => 'dd-icon-ui',
    		self::SET_MINIMAP             => 'dd-minimap',
    	];



  protected $initialized = false;
  protected $ssl = true;



  /**
  * Initialise the Data Dragon by Cdn. Set version
  *
  */
  public function initByCdn()
	{
		$data = file_get_contents("https://ddragon.leagueoflegends.com/api/versions.json");
		if ($data == false)
			throw new Exception('Version list failed to be fetched from DataDragon.');

		$data = json_decode($data);
    $version = reset($data);

    $this->setSettings([
      self::SET_VERSION => $version,
      self::SET_ENDPOINT => $this->getCdnUrl(),
    ]);
    $this->initialized = true;


	}

  public function setSettings(array $values)
	{
		foreach ($values as $name => $value){
			$this->settings[$name] = $value;
    }
	}

  public function getSetting($string){
    return $this->settings[$string];
  }

  public function getCdnUrl(){
    return ($this->ssl?"https":"http")."://ddragon.leagueoflegends.com/cdn/";
  }



  /**
  * Get profile icon of a user
  *
  * @param int icon_id
  */

  public function getProfileIcon($icon_id){
    return $this->getSetting(self::SET_ENDPOINT).$this->getSetting(self::SET_VERSION)."/img/profileicon/{$icon_id}.png";
  }


  }



 ?>
