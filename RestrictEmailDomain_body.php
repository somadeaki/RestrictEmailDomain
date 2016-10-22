<?php

/**
 * This extension enables the restriction of email address domains when creating new accounts. 
 *
 * @author Soma Deáki <sdeaki@gmail.com>
 */

class RestrictEmailDomainPreAuthenticationProvider extends MediaWiki\Auth\AbstractPreAuthenticationProvider {
	
	public function testForAccountCreation($user, $creator, array $reqs) {
		global $wgEmailDomain;
		
		if ($wgEmailDomain) {
			list($name, $host) = explode("@", $user->getEmail());
			
			if ((is_array($wgEmailDomain) && in_array($host, $wgEmailDomain)) || $host == $wgEmailDomain) {
				return StatusValue::newGood();
			}
		}
		
		$msg = wfMessage('restrictemaildomain-error')-> plain();
		return StatusValue::newFatal( $msg );
	}
}