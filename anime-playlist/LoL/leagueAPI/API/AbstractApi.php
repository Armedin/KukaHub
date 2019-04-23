<?php
  namespace leagueAPI\API;

  use leagueAPI\API;
  use leagueAPI\Region;
  use leagueAPI\Exceptions\LockedRegionException;
  use leagueAPI\Exceptions\CurlHttpException;
  //use leagueAPI\

  abstract class AbstractApi{


    /**
    * Constant variables for URL
    *@ strings
    */
    const API_BASEURL = '.api.riotgames.com';
    const RESOURCE_SUMMONER_VERSION = 'v4';
    const RESOURCE_LEAGUE_VERSION = 'v4';


    /**
    * End point for URL
    *
    *@var string
    */
    protected $endpoint;

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
  	* Holds the query parameters of the request!
  	*
  	* @var array
  	*/
	  protected $query_param = [];


    /**
    * Access to the api object
    * to perform different requests
    */
    protected $api;

    /**
    * API Key
    */
    protected $key;

    /**
    * Locked regions
    * The Regions that are not supported!
    */
    protected $lockedRegions = array();


    /**
     * Set the key to be used in the API.
     *
     * @param string $key
     *
     * @return $this
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * Set the endpoint
     *
     * @param string $key
     *
     * @return $this
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * Get the enpoint
     *
     * @return endpoint
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }


    public function __construct(API $api){
      $this->api = $api;
    }

    /**
    * Makes a request to API
    *
    * @throws LockedRegionException
    *
    * @return decoded content
    */
    protected function makeRequest(){
      if($this->region->isLocked($this->lockedRegions)){
        throw new LockedRegionException('This Region is Locked! Please wait till next update.');
      }else{
        $url = $this->getRequestURL(); // get full URL
        return $this->curlRequest($url);
      }
    }


    /**
    *@return Region of the API
    */

    public function getRegion(){
      return $this->region;
    }


    /**
    * This is the URL in which we will get
    * the data from
    *
    *@return string
    */

    public function getRequestURL(){
      $url_region_part = strtolower($this->getRegion()->getRegionID());
      $url_base = self::API_BASEURL;
      $url_key_part = "?api_key=".$this->key; //Key param

      //Query parameters
      $url_query_param="";
      foreach ($this->query_param as $key => $value) {
        $url_query_param.="&$key=$value";
      }

      return "https://" . $url_region_part . $url_base . $this->getEndpoint() . $url_key_part . $url_query_param;
    }

    /**
    * cURL Actually makes the HTTP requests!
    *
    *@param fullURL
    *
    *@return decoded_json
    */
    public function curlRequest($url){

      $response = null;

      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache"
        ),
      ));

      $content = curl_exec($curl);
      $err = curl_error($curl);
      $resultStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE); //check http code!

      if($resultStatus == 200){
        $response = json_decode($content, true);
      }else{
        throw new CurlHttpException('LeagueAPI: Request Failed: HTTP status code: ' . $resultStatus);
      }
      curl_close($curl);
      $this->query_data = [];
      return $response;
    }


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
    * Add data to query param
    *
    */
    public function addQueryParam($key, $value){
      if(!is_null($value)){
        $this->query_param[$key] = $value;
      }
      return $this;
    }



  }

 ?>
