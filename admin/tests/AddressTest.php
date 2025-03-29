<?php

use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    protected $url = 'http://localhost/project_testing_software/address.php';

    public function testInsertAddressWithEmptyData()
    {
        $data = [
            'firstname' => '',
            'phone' => '',
            'diachinh' => '',
            'addcomment' => ''
        ];

        $response = $this->postRequest($this->url, $data);
        $this->assertStringContainsString('alert("Vui lòng nhập đầy đủ thông tin")', $response, "Address insertion should fail with empty data.");
    }

    public function testInsertAdressSuccess()
    {
        $data = [
            'firstname' => 'Le Trong Nhan',
            'phone' => '0123456789',
            'diachinh' => '123abc,q1,HCM',
            'addcomment' => ''
        ];

        $response = $this->postRequest($this->url, $data);
        $this->assertStringNotContainsString('alert("Vui lòng nhập đầy đủ thông tin")', $response, "Address insertion should succeed with valid data.");
    }

    public function testInsertAdressFailed()
    {
        $data = [
            'firstname' => 'Le Trong Nhan!@#',
            'phone' => 'asdxyz@#$',
            'diachinh' => '123abc,q1,HCM@#$',
            'addcomment' => ''
        ];

        $response = $this->postRequest($this->url, $data);
        $this->assertStringContainsString('alert("Vui lòng nhập đầy đủ thông tin")', $response, "Address insertion should fail with invalid data.");
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