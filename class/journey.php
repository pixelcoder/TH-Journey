<?php 

Class Journey{

	public $output;

	/**
	 * Take a list of travel passes and shuffles before building 
	 * @param  array  $journeys Formatted array
	 * @return array           array of values associated with each journey in the array
	 */
	public function get_journey($journeys = array()){

		$this->output = null;
		
		shuffle($journeys);

		$i = 0;

		foreach($journeys as $journey) :

			$this->output[$i]['pass']['type'] 						= !empty($journey['pass']['type']) ? $journey['pass']['type'] : null;
			$this->output[$i]['pass']['details']['number'] 			= !empty($journey['pass']['details']['number']) ? $journey['pass']['details']['number'] : null;
			$this->output[$i]['pass']['details']['from']			= !empty($journey['pass']['details']['from']) ? $journey['pass']['details']['from'] : null;
			$this->output[$i]['pass']['details']['to']				= !empty($journey['pass']['details']['to']) ? $journey['pass']['details']['to'] : null;
			$this->output[$i]['pass']['details']['seat']			= !empty($journey['pass']['details']['seat']) ? $journey['pass']['details']['seat'] : null;
			$this->output[$i]['pass']['details']['gate']			= !empty($journey['pass']['details']['gate']) ? $journey['pass']['details']['gate'] : null;
			$this->output[$i]['pass']['details']['info']['type']	= !empty($journey['pass']['details']['info']['type']) ? $journey['pass']['details']['info']['type'] : null;
			$this->output[$i]['pass']['details']['info']['counter']	= !empty($journey['pass']['details']['info']['counter']) ? $journey['pass']['details']['info']['counter'] : null;
			$this->output[$i]['pass']['details']['info']['message']	= !empty($journey['pass']['details']['info']['message']) ? $journey['pass']['details']['info']['message'] : null;

			$i++;

		endforeach;

		return $this->output;

	}

}

