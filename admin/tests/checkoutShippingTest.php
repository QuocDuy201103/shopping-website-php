<?php

use PHPUnit\Framework\TestCase;

class checkoutShippingTest extends TestCase
{
    protected $addressUrl = 'http://localhost/project_testing_software/address.php';
    protected $checkoutShippingUrl = 'http://localhost/project_testing_software/checkout-shipping.php';

    public function testProceedToCheckoutWithoutCheckbox()
    {
        $data = [
            'firstname' => 'Le Trong Nhan',
            'phone' => '0123456789',
            'diachinh' => '123abc,q1,HCM',
            'addcomment' => '',
            'deliverymethod' => '' // Checkbox not selected
        ];

        $response = $this->postRequest($this->checkoutShippingUrl, $data);
        $this->assertStringContainsString('alert("Vui lòng chọn phương thức thanh toán")', $response, "Proceeding to checkout should fail without selecting a checkbox.");
    }

    public function testProceedToCheckoutWithCheckbox()
    {
        $data = [
            'firstname' => 'Le Trong Nhan',
            'phone' => '0123456789',
            'diachinh' => '123abc,q1,HCM',
            'addcomment' => '',
            'deliverymethod' => '1' // Checkbox selected
        ];

        $response = $this->postRequest($this->checkoutShippingUrl, $data);
        $this->assertStringNotContainsString('alert("Vui lòng chọn phương thức thanh toán")', $response, "Proceeding to checkout should succeed with checkbox selected.");
    }
    private function postRequest($url, $data)
    {
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ],
        ];
        $context  = stream_context_create($options);
        return file_get_contents($url, false, $context);
    }
}