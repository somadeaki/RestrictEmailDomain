# RestrictEmailDomain
A MediaWiki extension that allows admins to restrict account creation to specified email domains.

#Install instructions

##1. Download

Download the soure files and put them in the `<mediawiki_dir>/extensions/RestrictEmailDomain` directory.

##2. Configure

Edit LocalSettings.php in your MediaWiki root directory and follow these steps.

### 1. Load the extension

```
wfLoadExtension('RestrictEmailDomain');
```

### 2. Define the list of allowed domains. You can either set this variable to a single string, or a  list of strings.

```
$wgEmailDomain = 'example.com';  // Single Domain
$wgEmailDomain = array('example.com', 'example2.com');  // List of domains
```

### 3. Register the extension as a pre-auth provider

```
$wgAuthManagerAutoConfig['preauth'] = [
	'RestrictEmailDomainPreAuthenticationProvider' => [
		'class' => 'RestrictEmailDomainPreAuthenticationProvider'
	],
];
```

### Example configuration

```
wfLoadExtension('RestrictEmailDomain');
$wgEmailDomain = 'mydomain.com'; 
$wgAuthManagerAutoConfig['preauth'] = [
	'RestrictEmailDomainPreAuthenticationProvider' => [
		'class' => 'RestrictEmailDomainPreAuthenticationProvider',
	],
];
```

Please note that localization is currently only available in English.

