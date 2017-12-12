<?php

/**
 * Declare common (backend|frontend) global functions here
 * but try not to use any global functions unless you need.
 */

if (!function_exists('dd')) {
	function dd() {
		echo "<pre>";var_dump(func_get_args());die;
	}
}

if (! function_exists('upgrade_mix')) {
	/**
	 * Get the path to a versioned Mix file.
	 *
	 * @param  string  $path
	 * @param  string  $manifestDirectory
	 *
	 * @throws \Exception
	 */
	function upgrade_mix($path, $manifestDirectory = '')
	{
		static $manifests = [];

		if (substr($path, 0, 1) !== '/') {
			$path = "/".$path;
		}

		if ($manifestDirectory && substr($manifestDirectory, 0, 1) !== '/') {
			$manifestDirectory = "/".$manifestDirectory;
		}

		$publicPath = NINJA_EMAIL_EDITOR_PUBLIC_DIR_URL;

		if (file_exists($publicPath.'/hot')) {
			return (is_ssl() ? "https" : "http")."://localhost:8080".$path;
		}

		$manifestPath = $publicPath.$manifestDirectory.'mix-manifest.json';

		if (! isset($manifests[$manifestPath])) {
			if (! file_exists($manifestPath)) {
				throw new Exception('The Mix manifest does not exist.');
			}

			$manifests[$manifestPath] = json_decode(file_get_contents($manifestPath), true);
		}

		$manifest = $manifests[$manifestPath];

		if (! isset($manifest[$path])) {
			throw new Exception(
				"Unable to locate Mix file: ".$path.". Please check your ".
				'webpack.mix.js output paths and try again.'
			);
		}

		return \UpgradeList\App::publicUrl($manifestDirectory.$manifest[$path]);
	}
}

if (!function_exists('getRealIpAddr')) {

   function getRealIpAddr()
    {
        if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) { //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) { //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }
}