<?php

require_once 'vendor/autoload.php';


$client = new \Epay\Client(array(
    'MERCHANT_CERTIFICATE_ID' => '00c182b189',
    'MERCHANT_NAME'           => 'Demo Shop',
    'PRIVATE_KEY_FN'          => 'vendor/iborodikhin/kazkom-epay/tests/data/cert.prv',
    'PRIVATE_KEY_PASS'        => 'nissan',
    'PRIVATE_KEY_ENCRYPTED'   => 1,
    'XML_TEMPLATE_FN'         => 'vendor/iborodikhin/kazkom-epay/tests/data/template.xml',
    'XML_TEMPLATE_CONFIRM_FN' => 'vendor/iborodikhin/kazkom-epay/tests/data/template_confirm.xml',
    'PUBLIC_KEY_FN'           => 'vendor/iborodikhin/kazkom-epay/tests/data/data/kkbca_test.pub',
    'MERCHANT_ID'             => '92061101',
));

$xml = $client->processRequest(time(), $client->getCurrencyId('KZT'), 555);

?>

<html>
<head>
<title>Pay</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<body>
<form name="SendOrder" method="post" action="https://testpay.kkb.kz/jsp/process/logon.jsp">
   <input type="hidden" name="Signed_Order_B64" value="<?php echo $xml ?>">
    E-mail: <input type="text" name="email" size=50 maxlength=50  value="faridmovsumov@gmail.com">
   <p>
   <input type="hidden" name="Language" value="eng"> <!-- ÿçûê ôîðìû îïëàòû rus/eng -->
   <input type="hidden" name="BackLink" value="http://epay.mil/return.php">
   <input type="hidden" name="PostLink" value="http://epay.mil/return.php">
   <input type="submit" name="GotoPay"  value="Pay" >
</form>
</body>
</html>