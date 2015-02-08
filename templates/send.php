 <?php
 include 'menu_bar.html';
 require_once "DAL/settings.php";
 require_once 'lib/swift_required.php';
 require_once 'DAL/PDOConnection.php';
 $productDal = new products();
 
 // Sets Date Ordered Field
 if(isset($_GET['product'])){
	date_default_timezone_set('UTC');
	$today = date('d-m-Y');
    $productDal->order($_GET['product'], $today);
		$productDal->order_history($id, $today);	
    
	//Create the transport
			$transport = Swift_MailTransport::newInstance(SMTP_HOST, SMTP_PORT);	
			$mailer = Swift_Mailer::newInstance($transport);
			
			$message = Swift_Message::newInstance('Please Order')
			->setSubject('Product Order: ' .$_GET['product'])
			->setFrom($EMAIL_ORDERS_FROM)
			->setCc($EMAIL_ORDERS_CC)
			->setTo($EMAIL_ORDERS_TO)
			
			//Order Body//
			
			->setBody('<html>'.
                '<head>Hello<br /><br /></head>'.
                '<body>'.
                'Please will you kindly order ' .$_GET['product'] .
                '<br /><br />Kind Regards<br /><br />'.
                'PostPack'.
                '</body>' .
                '</html>',
                'text/html'
            );
			
			//$numSent = $mailer->send($message);
			//printf("Send %d messages\n", $numSent);
			
			$result = $mailer->send($message);
			if ($result > 0)
			{
				echo "<div class='panel panel-primary'>
<div class='panel-heading' style='text-align:center;'><h3>Product Details</h3></div>
<div class='panel-body'>
				<p>Your order of <strong style='red'>".$_GET['product'],"</strong> has been sent, please check the dispatch inbox for a copy of the email.</p>
				</div></div>";
			}
			else{
				
				echo "<div class='panel panel-danger'>
<div class='panel-heading' style='text-align:center;'><h3>Order Failure</h3></div>
<div class='panel-body'>
				<p>Your order of <strong style='red'>".$_GET['product'],"</strong> was not sent, please call the office with your order.</p>
				</div></div>";
				
				}
 }
 ?>
			