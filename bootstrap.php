<?php 
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require __DIR__.'/vendor/autoload.php';

$apiContext = new ApiContext(
	new OAuthTokenCredential(
		'Acx3MZA0f7mYcQRQEQY7HwonP7G2pNmzOeQP4N3c96DglBlGRNNGdYlFZm8vEKZD3UiaeuGehsqO-j-i',
		'EPcy3BNgGIOuX3-QAeZKrGcr40wSS8-JKihgsJGvgbNyyIWO0yW-tjwHtC_FcVBj-YL3RxNPFm1ZZJq2'
	)
);

$apiContext->setConfig(
	array(
		'mode' => 'sandbox',
		'http.ConnectionTimeOut' => 30,
		'log.LogEnable' => true,
		'log.Filename' => 'PayPal.log',
		'log.LogLevel' => 'DEBUG',

	)
);

 ?>