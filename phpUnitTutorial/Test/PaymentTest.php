<?php

namespace phpUnitTutorial\Test;

use phpUnitTutorial\Payment;

class PaymentTest extends \PHPUnit_Framework_TestCase
{
    public function testProcessPaymentReturnsTrueOnSucssessfullPayment(){
    	$paymentDetails = array(
		    'amount'   => 123.99,
		    'card_num' => '4111-1111-1111-1111',
		    'exp_date' => '03/2013',
		);
		$payment = new Payment();

		$authNet=$this->getMockBuilder('\AuthorizeNetAIM')
			->setConstructorArgs(array($payment::API_ID, $payment::TRANS_KEY))
			->getMock();

		$response = new \stdClass();
		$response->approved = true;
		$response->transaction_id = 123;

		$authNet->expects($this->once())
			->method('authorizeAndCapture')
			->will($this->returnValue($response));

        $result = $payment->processPayment($authNet, $paymentDetails);

        $this->assertTrue($result);

    }
}