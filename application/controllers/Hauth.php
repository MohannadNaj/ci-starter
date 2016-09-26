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
}
