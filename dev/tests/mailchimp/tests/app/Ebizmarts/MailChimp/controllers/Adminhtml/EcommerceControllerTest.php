<?php

require_once BP . DS . 'app/code/community/Ebizmarts/MailChimp/controllers/Adminhtml/EcommerceController.php';

class Ebizmarts_MailChimp_Adminhtml_EcommerceControllerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Ebizmarts_MailChimp_Adminhtml_EcommerceController $ecommerceController
     */
    private $ecommerceController;

    public function setUp()
    {
        Mage::app('default');
        $this->ecommerceController = $this->getMockBuilder(Ebizmarts_MailChimp_Adminhtml_EcommerceController::class);
    }

    public function tearDown()
    {
        $this->ecommerceController = null;
    }

    public function testResetLocalErrorsAction()
    {
        $paramKey = 'scope';
        $scope = 'default-0';
        $scopeArray = array('default', 0);
        $storeId = 1;
        $result = 1;

        $ecommerceControllerMock = $this->ecommerceController
            ->disableOriginalConstructor()
            ->setMethods(array('makeHelper'))
            ->getMock();

        $helperMock = $this->getMockBuilder(Ebizmarts_MailChimp_Helper_Data::class)
            ->disableOriginalConstructor()
            ->setMethods(array('getMageApp', 'resetErrors'))
            ->getMock();

        $mageAppMock = $this->getMockBuilder(Mage_Core_Model_App::class)
            ->disableOriginalConstructor()
            ->setMethods(array('getRequest', 'getStores', 'getResponse'))
            ->getMock();

        $requestMock = $this->getMockBuilder(Mage_Core_Controller_Request_Http::class)
            ->disableOriginalConstructor()
            ->setMethods(array('getParam'))
            ->getMock();

        $responseMock = $this->getMockBuilder(Mage_Core_Controller_Response_Http::class)
            ->disableOriginalConstructor()
            ->setMethods(array('setBody'))
            ->getMock();

        $storeCollectionMock = $this->getMockBuilder(Mage_Core_Model_Resource_Store_Collection::class)
            ->disableOriginalConstructor()
            ->getMock();

        $storeMock = $this->getMockBuilder(Mage_Core_Model_Store::class)
            ->disableOriginalConstructor()
            ->setMethods(array('getId'))
            ->getMock();

        $stores = array();
        $stores[] = $storeMock;

        $ecommerceControllerMock->expects($this->once())->method('makeHelper')->willReturn($helperMock);

        $helperMock->expects($this->once())->method('getMageApp')->willReturn($mageAppMock);

        $mageAppMock->expects($this->once())->method('getRequest')->willReturn($requestMock);

        $requestMock->expects($this->once())->method('getParam')->with($paramKey)->willReturn($scope);

        $mageAppMock->expects($this->once())->method('getStores')->willReturn($storeCollectionMock);

        $storeCollectionMock->expects($this->once())->method('getIterator')->willReturn(new ArrayIterator($stores));

        $storeMock->expects($this->once())->method('getId')->willReturn($storeId);

        $helperMock->expects($this->exactly(2))->method('resetErrors')->withConsecutive(
            array($storeId),
            array($scopeArray[1], $scopeArray[0])
            );

        $mageAppMock->expects($this->once())->method('getResponse')->willReturn($responseMock);

        $responseMock->expects($this->once())->method('setBody')->with($result);

        $ecommerceControllerMock->resetLocalErrorsAction();
    }

    public function testResetEcommerceDataAction()
    {
        $paramKey = 'scope';
        $scope = 'stores-1';
        $scopeArray = array('stores', 1);
        $result = 1;

        $ecommerceControllerMock = $this->ecommerceController
            ->disableOriginalConstructor()
            ->setMethods(array('makeHelper'))
            ->getMock();

        $helperMock = $this->getMockBuilder(Ebizmarts_MailChimp_Helper_Data::class)
            ->disableOriginalConstructor()
            ->setMethods(array('getMageApp', 'resetMCEcommerceData'))
            ->getMock();

        $mageAppMock = $this->getMockBuilder(Mage_Core_Model_App::class)
            ->disableOriginalConstructor()
            ->setMethods(array('getRequest', 'getResponse'))
            ->getMock();

        $requestMock = $this->getMockBuilder(Mage_Core_Controller_Request_Http::class)
            ->disableOriginalConstructor()
            ->setMethods(array('getParam'))
            ->getMock();

        $responseMock = $this->getMockBuilder(Mage_Core_Controller_Response_Http::class)
            ->disableOriginalConstructor()
            ->setMethods(array('setBody'))
            ->getMock();

        $ecommerceControllerMock->expects($this->once())->method('makeHelper')->willReturn($helperMock);

        $helperMock->expects($this->once())->method('getMageApp')->willReturn($mageAppMock);

        $mageAppMock->expects($this->once())->method('getRequest')->willReturn($requestMock);

        $requestMock->expects($this->once())->method('getParam')->with($paramKey)->willReturn($scope);

        $helperMock->expects($this->once())->method('resetMCEcommerceData')->with($scopeArray[1], $scopeArray[0], true);

        $mageAppMock->expects($this->once())->method('getResponse')->willReturn($responseMock);

        $responseMock->expects($this->once())->method('setBody')->with($result);

        $ecommerceControllerMock->resetEcommerceDataAction();
    }

    public function testResendEcommerceDataAction()
    {
        $paramKey = 'scope';
        $scope = 'stores-1';
        $scopeArray = array('stores', 1);
        $result = 1;

        $ecommerceControllerMock = $this->ecommerceController
            ->disableOriginalConstructor()
            ->setMethods(array('makeHelper'))
            ->getMock();

        $helperMock = $this->getMockBuilder(Ebizmarts_MailChimp_Helper_Data::class)
            ->disableOriginalConstructor()
            ->setMethods(array('getMageApp', 'resetMCEcommerceData'))
            ->getMock();

        $mageAppMock = $this->getMockBuilder(Mage_Core_Model_App::class)
            ->disableOriginalConstructor()
            ->setMethods(array('getRequest', 'getResponse'))
            ->getMock();

        $requestMock = $this->getMockBuilder(Mage_Core_Controller_Request_Http::class)
            ->disableOriginalConstructor()
            ->setMethods(array('getParam'))
            ->getMock();

        $responseMock = $this->getMockBuilder(Mage_Core_Controller_Response_Http::class)
            ->disableOriginalConstructor()
            ->setMethods(array('setBody'))
            ->getMock();

        $ecommerceControllerMock->expects($this->once())->method('makeHelper')->willReturn($helperMock);

        $helperMock->expects($this->once())->method('getMageApp')->willReturn($mageAppMock);

        $mageAppMock->expects($this->once())->method('getRequest')->willReturn($requestMock);

        $requestMock->expects($this->once())->method('getParam')->with($paramKey)->willReturn($scope);

        $helperMock->expects($this->once())->method('resetMCEcommerceData')->with($scopeArray[1], $scopeArray[0], false);

        $mageAppMock->expects($this->once())->method('getResponse')->willReturn($responseMock);

        $responseMock->expects($this->once())->method('setBody')->with($result);

        $ecommerceControllerMock->resendEcommerceDataAction();
    }

    public function testCreateMergeFieldsAction()
    {
        $paramKey = 'scope';
        $scope = 'stores-1';
        $scopeArray = array('stores', 1);
        $result = 1;

        $ecommerceControllerMock = $this->ecommerceController
            ->disableOriginalConstructor()
            ->setMethods(array('makeHelper'))
            ->getMock();

        $helperMock = $this->getMockBuilder(Ebizmarts_MailChimp_Helper_Data::class)
            ->disableOriginalConstructor()
            ->setMethods(array('getMageApp', 'isSubscriptionEnabled', 'createMergeFields'))
            ->getMock();

        $mageAppMock = $this->getMockBuilder(Mage_Core_Model_App::class)
            ->disableOriginalConstructor()
            ->setMethods(array('getRequest', 'getResponse'))
            ->getMock();

        $requestMock = $this->getMockBuilder(Mage_Core_Controller_Request_Http::class)
            ->disableOriginalConstructor()
            ->setMethods(array('getParam'))
            ->getMock();

        $responseMock = $this->getMockBuilder(Mage_Core_Controller_Response_Http::class)
            ->disableOriginalConstructor()
            ->setMethods(array('setBody'))
            ->getMock();

        $ecommerceControllerMock->expects($this->once())->method('makeHelper')->willReturn($helperMock);

        $helperMock->expects($this->once())->method('getMageApp')->willReturn($mageAppMock);

        $mageAppMock->expects($this->once())->method('getRequest')->willReturn($requestMock);

        $requestMock->expects($this->once())->method('getParam')->with($paramKey)->willReturn($scope);

        $helperMock->expects($this->once())->method('isSubscriptionEnabled')->with($scopeArray[1], $scopeArray[0])->willReturn(true);
        $helperMock->expects($this->once())->method('createMergeFields')->with($scopeArray[1], $scopeArray[0]);

        $mageAppMock->expects($this->once())->method('getResponse')->willReturn($responseMock);

        $responseMock->expects($this->once())->method('setBody')->with($result);

        $ecommerceControllerMock->createMergeFieldsAction();
    }
}
