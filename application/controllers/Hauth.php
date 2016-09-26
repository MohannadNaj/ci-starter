<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hauth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect(site_url());
	}

	public function logout() {
       $twitter = $this->hybridauthlib->getAdapter( "Twitter" );
       $twitter->logout();
       $this->session->unset_userdata('user');
       redirect(site_url('/'));
	}
  	public function login($provider)
	{
		try
		{
			if ($this->hybridauthlib->providerEnabled($provider))
			{
				$service = $this->hybridauthlib->authenticate($provider);
				if ($service->isUserConnected())
				{
					$user_profile = $service->getUserProfile();

					$data['user_profile'] = (array) $user_profile;
					$data['user_profile']['social_provider'] = $provider;
					$sess = unserialize($this->hybridauthlib->getSessionData());
					$data['user_profile']['token'] = isset($sess['hauth_session.' . strtolower($provider) . '.token.access_token']) ? unserialize($sess['hauth_session.' . strtolower($provider) . '.token.access_token']) : '';
					$data['user_profile']['secret_token'] = isset($sess['hauth_session.' . strtolower($provider) . '.token.access_token_secret']) ? unserialize($sess['hauth_session.' . strtolower($provider) . '.token.access_token_secret']) : '';
					$this->load->model(array('Social_profile_model' => 'social'));
					if($this->session->userdata('identity') && $this->session->userdata('user_id')) {
						$this->social->setUser($this->session->userdata('user_id'));
					}
					if($this->social->mapHybridAuth($data['user_profile'])) {
						if($this->social->save()) {
							$user = $this->social->getUser();
							if($user) {
								// already has a logged in account.
								$this->ion_auth->set_session($user);
							} else {
								// new social-only account
								$this->load->model("user_model");
								extract($this->prepareNewSocialUser($provider, $data));
								$id = $this->ion_auth->register($identity, $password, $email); //ionAuth returns last inserted id if the insert was successful.
								if($id && $this->social->getId()) {
									if( $this->social->update( $this->social->getId() , ['user_id' => $id]) ) {
										$this->ion_auth->set_session($this->social->getUser($user));
									}
								} else {
									$this->session->set_flashdata('temp', 'our developer fu**ed up something!');
								}
							}
								redirect(site_url());
						} else {
							dd('db_error');
						}
					}
				}
				else // Cannot authenticate user
				{
					show_error('Cannot authenticate user');
				}
			}
			else // This service is not enabled.
			{
				show_404($_SERVER['REQUEST_URI']);
			}
		}
		catch(Exception $e)
		{
			$error = 'Unexpected error';
			switch($e->getCode())
			{
				case 0 : $error = 'Unspecified error.'; break;
				case 1 : $error = 'Hybriauth configuration error.'; break;
				case 2 : $error = 'Provider not properly configured.'; break;
				case 3 : $error = 'Unknown or disabled provider.'; break;
				case 4 : $error = 'Missing provider application credentials.'; break;
				case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
				         //redirect();
				if (isset($service))
				{
					$service->logout();
				}
				show_error('User has cancelled the authentication or the provider refused the connection.');
				break;
				case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
				break;
				case 7 : $error = 'User not connected to the provider.';
				break;
			}

			if (isset($service))
			{
				$service->logout();
			}

		}
	}

	public function endpoint()
	{


		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			$_GET = $_REQUEST;
		}

		require_once APPPATH.'../vendor/hybridauth/hybridauth/hybridauth/index.php';
	}

	public function prepareNewSocialUser($provider, $data) {
		$result = array();
		if($this->user_model->get_by('username', $data['user_profile']['displayname'])) {
			$result['identity'] = substr($data['user_profile']['displayname'] , 0, 100);
		} else {
			$result['identity'] =  substr( $data['user_profile']['identifier'] . '_'. $provider , 0, 99);
		}
		$result['password'] = sha1(json_encode($data['user_profile']['displayname'] . $provider . time() ));
		if(empty($data['user_profile']['email'])) {
			$result['email'] = substr( $data['user_profile']['identifier'] . "@". $provider . ".xyz" , 0 , 99);
		} else {
			$result['email'] = $data['user_profile']['email'];
		}
		return $result;
	}
}
