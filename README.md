FIFAStats using TYPO3 CMS
=========

Getting Started
---------------

TYPO3 requires a webserver with PHP and a database (MySQL recommended).
Accessing the backend through a supported browser.

Add an AdditionalConfiguration.php with your settings.

SAMPLE:
```php
<?php
$GLOBALS['TYPO3_CONF_VARS']['DB']['database'] = 'typo3_fifa';
$GLOBALS['TYPO3_CONF_VARS']['DB']['host']     = '127.0.0.1';
$GLOBALS['TYPO3_CONF_VARS']['DB']['port'] = 3306;
$GLOBALS['TYPO3_CONF_VARS']['DB']['username'] = 'root';
$GLOBALS['TYPO3_CONF_VARS']['DB']['password'] = '';
?>
```