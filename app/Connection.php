<?php

namespace App;


class Connection
{
	
	protected $ClientID;
	protected $ClientSecret;
	protected $host = 'http://www.kuis88.com/oauth?';

	function __construct($client_id, $client_secret)
	{
		$this->ClientID = $client_id;
		$this->ClientSecret = $client_secret;
	}

	public function url()
	{
		$ClientID = $this->ClientID;
		$signature = $this->signature();

		$Data = [
			'client_id' => $ClientID,
			'signature'	=> $signature,
			'time'		=> $this->connTime()
		];

		$String = http_build_query($Data, NULL, '&');
		return $this->host. $String;
	}

	public function getUser($User)
	{
		$ClientID = $this->ClientID;
		$signature = $this->signature();

		$User = array_change_key_case($User);

		$signatureData = [
			'client_id' => $ClientID,
			'signature' => $signature,
			'time'		=> $this->connTime()
		];

		return  array_merge($User, $signatureData);
	}

	private function connTime()
	{
		return time();
	}

	private function signature()
	{
		return md5($this->ClientID.$this->ClientSecret.$this->connTime());
	}
}