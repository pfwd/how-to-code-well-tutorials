<?php
interface StandardPaymentInterface{
    public function pay();
}
interface FraudCheckCheckInterface{
    public function fraudCheck();
}
interface ThreeDSecureCheckInterface{
    public function ThreeDCheck();
}
interface PaymentProcessInterface{
    public function process();
}
class PayFee implements  StandardPaymentInterface, ThreeDSecureCheckInterface, PaymentProcessInterface {
    public function pay(){}
    public function ThreeDCheck(){}
    public function process(){
        $this->ThreeDCheck();
        $this->pay();
    }
}

class WorldFee implements  StandardPaymentInterface, PaymentProcessInterface {
    public function pay(){}
    public function process(){
        $this->pay();
    }
}
class MintFee implements  StandardPaymentInterface, PaymentProcessInterface, FraudCheckCheckInterface {
    public function pay(){}
    public function fraudCheck(){}
    public function process(){
        $this->fraudCheck();
        $this->pay();
    }
}

class PaymentGateway {
    public function takePayment(PaymentProcessInterface $paymentType){
        $paymentType->process();

    }
}

$paymentType = new MintFee();
$gateway = new PaymentGateway();
$gateway->takePayment($paymentType);