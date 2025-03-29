<?php  
require_once 'database.php';
require_once 'UserManager.php';

?>
<?php
use PHPUnit\Framework\TestCase;

class ChangeStatusAdminAccount extends TestCase
{
    public function testChangeStatusUser_ActiveToInactive()
    {
        // Create a mock of the db object (mock class Database)
        $dbMock = $this->createMock(Database::class);

        // Simulate the behavior of the select method to return a result set with Active status
        $dbMock->method('select')
            ->willReturn((object) [
                'fetch_assoc' => function () {
                    return ['trangThai' => 'Active'];
                }
            ]);

        // Simulate the behavior of the update method to return true (successful update)
        $dbMock->method('update')
            ->willReturn(true);

        // Create the instance of the class containing the changeStatusUser method
        $userManager = new UserManager($dbMock);

        // Call the method with a username
        $result = $userManager->changeStatusUser('duy123');

        // Assert that the result contains the success message for "Inactive"
        $this->assertStringContainsString('Khóa người dùng thành công!', $result);
    }

    public function testChangeStatusUser_InactiveToActive()
    {
        // Create a mock of the db object
        $dbMock = $this->createMock(Database::class);

        // Simulate the behavior of the select method to return a result set with Inactive status
        $dbMock->method('select')
            ->willReturn((object) [
                'fetch_assoc' => function () {
                    return ['trangThai' => 'Inactive'];
                }
            ]);

        // Simulate the behavior of the update method to return true (successful update)
        $dbMock->method('update')
            ->willReturn(true);

        // Create the instance of the class containing the changeStatusUser method
        $userManager = new UserManager($dbMock);

        // Call the method with a username
        $result = $userManager->changeStatusUser('duy123');

        // Assert that the result contains the success message for "Active"
        $this->assertStringContainsString('Mở khóa người dùng thành công!', $result);
    }
    
}
