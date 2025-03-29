<?php

use PHPUnit\Framework\TestCase;

class OrderManagementTest extends TestCase
{
    protected $orderStatusUrl = 'http://localhost/project_testing_software/order_status.php';
    protected $loginUrl = 'http://localhost/project_testing_software/registration.php';
    protected $http_response_header = [];


    public function testOrderHistoryWhenLoggedIn()
    {
        // Simulate a logged-in user by setting session variables
        $_SESSION['ten'] = 'testUser';

        $response = $this->getRequest($this->orderStatusUrl);
        $this->assertStringContainsString('Chi tiết và lịch sử đơn hàng', $response, "Order history should be shown when user is logged in.");
    }

    public function testRedirectToLoginWhenNotLoggedIn()
    {
        // Ensure no user is logged in
        unset($_SESSION['ten']);

        $response = $this->getRequest($this->orderStatusUrl);
        $this->assertStringContainsString('Location: registration.php', implode("\n", $this->http_response_header), "User should be redirected to login page when not logged in.");
    }

    private function getRequest($url)
    {
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'GET',
            ],
        ];
        $context  = stream_context_create($options);
        return file_get_contents($url, false, $context);
    }
}