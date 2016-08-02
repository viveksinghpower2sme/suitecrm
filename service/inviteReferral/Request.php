<?php

class Request
{
    private $cookiePath;
    private $curlOptions;
    private $userAgents = array(
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/537.13+ (KHTML, like Gecko) Version/5.1.7 Safari/534.57.2',
        'Mozilla/5.0 (Windows NT 6.0; WOW64; rv:24.0) Gecko/20100101 Firefox/24.0',
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36',
    );
    private $cHandle = null;
    private $userAgent;
    public $info = null;
	public $proxy;
	public $Error = 0;
    /**
     * Initialize resources
     */
    public function __construct($cookieJar, $ssl_version = false,$aHeader=array())
    {
		$this->proxy = null;
		
		$this->cookiePath = realpath($cookieJar);
		if(!$this->cookiePath)
			$this->cookiePath = $cookieJar;

		// start request with new cookie
        if (file_exists($this->cookiePath)) {
            unlink($this->cookiePath);
        }
        $this->userAgent = $this->userAgents[array_rand($this->userAgents)];
		if(empty($aHeader))
			$aHeader = array('Expect:');
		 $this->curlOptions = array(
            // CURLOPT_COOKIESESSION => true,
			CURLOPT_HTTPHEADER => $aHeader,
			CURLOPT_VERBOSE =>false,
			CURLOPT_FAILONERROR => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_COOKIEJAR => $this->cookiePath,
            CURLOPT_COOKIEFILE => $this->cookiePath,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0'
        );
    }

    /**
     * Release resources
     */
    public function __destruct()
    {
        $this->close();
    }

    /**
     * process curl
     * @var $options Array
     */
    private function _process($options)
    {
        // if curl session is already there use that one
        // it will faster that way : only used for get

        if (is_null($this->cHandle)) {
            $this->cHandle = curl_init();
        }

        curl_setopt_array($this->cHandle, $this->curlOptions);
        curl_setopt_array($this->cHandle, $options);
        $contents = curl_exec($this->cHandle);
	$this->Error = curl_errno($this->cHandle);
        $this->info = curl_getinfo($this->cHandle);
        return $contents;
    }

    /**
     * Close curl session if open
     *
     */
    public function close()
    {
        if (!is_null($this->cHandle)) {
            curl_close($this->cHandle);
            $this->cHandle = null;
        }
    }

    /**
     * Get data from remote
     * @var $url a url string
     */
    public function get($url, $referer = false, $verifySSL = false, $sslVersion = false)
    {

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_POST => false,
        );
		$options[CURLOPT_TIMEOUT]=60;
		$options[CURLOPT_CONNECTTIMEOUT]=30;
        $uriComponents = parse_url($url);
        if($verifySSL) {
        	$options[CURLOPT_SSL_VERIFYPEER] = true;
        	$options[CURLOPT_SSL_VERIFYHOST] = true;
        } else {
	        $options[CURLOPT_SSL_VERIFYPEER] = false;
	        $options[CURLOPT_SSL_VERIFYHOST] = false;
        }
		if($this->proxy){
			$options[CURLOPT_PROXY]=$this->proxy;
			$options[CURLOPT_TIMEOUT]=30;
			$options[CURLOPT_CONNECTTIMEOUT]=10;
		}

        if ($referer) {
            $options[CURLOPT_REFERER] = $referer;
        }

        if ($sslVersion) {
            $options[CURLOPT_SSLVERSION] = $sslVersion;
        }

        return $this->_process($options);
    }

    /**
     * Post data to remote and return result
     * @var $url
     */
    public function post($url, $params, $referer = false,$sslVersion = false,$type=false)
    {
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $params,
        );
		
		$options[CURLOPT_TIMEOUT]=60;
		$options[CURLOPT_CONNECTTIMEOUT]=30;

		$options[CURLOPT_SSL_VERIFYPEER] = false;
        $options[CURLOPT_SSL_VERIFYHOST] = false;
		if($this->proxy){
			$options[CURLOPT_PROXY]=$this->proxy;
			$options[CURLOPT_TIMEOUT]=30;
			$options[CURLOPT_CONNECTTIMEOUT]=10;
		}


        if ($referer) {
            $options[CURLOPT_REFERER] = $referer;
        }

		if ($sslVersion) {
			if($sslVersion == -1)
				$sslVersion = 0;
            $options[CURLOPT_SSLVERSION] = $sslVersion;
        }
		
		if($type)
			$options[CURLOPT_HTTPHEADER] = array('Content-type: application/json; charset=utf-8');
        else
			$options[CURLOPT_HTTPHEADER] = array('Content-type: application/x-www-form-urlencoded');
		return $this->_process($options);
        // $this->close();
        // return $data;
    }

    /**
     * Get data samultaneously from remote
     *
     * Implemented using
     * http://www.onlineaspect.com/2009/01/26/how-to-use-curl_multi-without-blocking/
     *
     * @var $urls Array of urls
     * @var $callback   Callback to process data
     */
    public function getMultiple($urls)
    {
        // TODO: Implement later
    }

	public function setProxy($setproxy){
		$this->proxy=$setproxy;
	}

}

// End of Request
