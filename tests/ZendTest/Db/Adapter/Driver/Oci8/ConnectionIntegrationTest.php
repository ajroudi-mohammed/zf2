<?php
namespace ZendTest\Db\Adapter\Driver\Oci8;

use Zend\Db\Adapter\Driver\Oci8\Oci8;
use Zend\Db\Adapter\Driver\Oci8\Connection;

/**
 * @group integration
 * @group integration-sqlserver
 */
class ConnectionIntegrationTest extends AbstractIntegrationTest
{
    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Connection::getCurrentSchema
     */
    public function testGetCurrentSchema()
    {
        $connection = new Connection($this->variables);
        $this->assertInternalType('string', $connection->getCurrentSchema());
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Connection::setResource
     */
    public function testSetResource()
    {
        $this->markTestIncomplete('edit this');
        $resource = oci_connect($this->variables['username'], $this->variables['password']);

        $connection = new Connection(array());
        $this->assertSame($connection, $connection->setResource($resource));

        $connection->disconnect();
        unset($connection);
        unset($resource);
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Connection::getResource
     */
    public function testGetResource()
    {
        $connection = new Connection($this->variables);
        $connection->connect();
        $this->assertInternalType('resource', $connection->getResource());

        $connection->disconnect();
        unset($connection);
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Connection::connect
     */
    public function testConnect()
    {
        $connection = new Connection($this->variables);
        $this->assertSame($connection, $connection->connect());
        $this->assertTrue($connection->isConnected());

        $connection->disconnect();
        unset($connection);
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Connection::isConnected
     */
    public function testIsConnected()
    {
        $connection = new Connection($this->variables);
        $this->assertFalse($connection->isConnected());
        $this->assertSame($connection, $connection->connect());
        $this->assertTrue($connection->isConnected());

        $connection->disconnect();
        unset($connection);
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Connection::disconnect
     */
    public function testDisconnect()
    {
        $connection = new Connection($this->variables);
        $connection->connect();
        $this->assertTrue($connection->isConnected());
        $connection->disconnect();
        $this->assertFalse($connection->isConnected());
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Connection::beginTransaction
     * @todo   Implement testBeginTransaction().
     */
    public function testBeginTransaction()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Connection::commit
     * @todo   Implement testCommit().
     */
    public function testCommit()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Connection::rollback
     * @todo   Implement testRollback().
     */
    public function testRollback()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Connection::execute
     */
    public function testExecute()
    {
        $oci8 = new Oci8($this->variables);
        $connection = $oci8->getConnection();

        $result = $connection->execute('SELECT \'foo\' FROM DUAL');
        $this->assertInstanceOf('Zend\Db\Adapter\Driver\Oci8\Result', $result);
    }

    /**
     * @covers Zend\Db\Adapter\Driver\Oci8\Connection::getLastGeneratedValue
     */
    public function testGetLastGeneratedValue()
    {
        $this->markTestIncomplete('Need to create a temporary sequence.');
        $connection = new Connection($this->variables);
        $connection->getLastGeneratedValue();
    }
}
