<?php
  namespace leagueAPI;

  use leagueAPI\Region;
  use leagueAPI\API\AbstractApi;
  use leagueAPI\Exceptions\ClassNotFoundException;
  use leagueAPI\Exceptions\NoKeyException;



  class API{

    /**
    * Default Region to be used
    *
    *@var string
    */
    protected $region = 'eune';

    /**
  	* The amount of seconds to wait for response
    * from the server
  	*
  	* @var int
  	*/
	  protected $timeout = 0;


    /**
    * Set another Region
    * @param $region
    *
    * @return $this
    */
    public function setRegion($region){

      if(!$region instanceof Region){
			  $region = new Region($region);
		  }
      $this->region = $region;
      return $this;
    }

    /**
  	* Timeout in seconds for the server to respond
    * If the server does not respond within the time,
  	* an Exception is thrown.
    *
  	* @param float $seconds
  	* @return $this
  	*/
  	public function setTimeout($seconds)
  	{
  		$this->timeout = floatval($seconds);
  		return $this;
  	}


    /**
     * This is the API key
     *
     * @var string
     */
    private $key;


    /**
    * Initialise the client and the API key
    * @param string  $key
    *
    */
    public function __construct($key = null){
      if(is_null($key)){
        throw new NoKeyException('The API key is needed !');
      }
      $this->key = $key;
    }


    /**
    * The main call function. This function loads an instance of the API
    * This method is called when trying to call on particular functions
    * to load instance of AbstractApi.
    */
    public function __call($method, $arguments){

      unset($arguments);

      $fileIns = ucwords(strtolower($method));
      $className = 'leagueAPI\\API\\'.$fileIns;
      if(!class_exists($className)){
        throw new ClassNotFoundException('The class"'.$className.'" was not found.');
      }
      $api = new $className($this);

      $api->setRegion($this->region)
          ->setKey($this->key);

      return $api;
    }




  }





 ?>
