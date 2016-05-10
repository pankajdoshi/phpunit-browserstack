<?php
require 'vendor/autoload.php';

define('BROWSERSTACK_USERNAME', getenv('BROWSERSTACK_USERNAME'));
define('BROWSERSTACK_ACCESS_KEY', getenv('BROWSERSTACK_ACCESS_KEY'));

class SeleniumTest extends PHPUnit_Framework_TestCase {
  public function testGoogle() {
    $url = "https://" . BROWSERSTACK_USERNAME . ":" . BROWSERSTACK_ACCESS_KEY . "@hub.browserstack.com/wd/hub";
    $caps = array(
      "build" => "Sample phpunit Tests",
      "name" => "phpunit parallel tests",
      "browser" => "IE",
      "browser_version" => "9.0",
      "os" => "Windows",
      "os_version" => "7",
      "browserstack.debug" => "true"
    );
    $web_driver = RemoteWebDriver::create(
      $url,
      $caps
    );
    $web_driver->get("http://www.google.com");
    print $web_driver->getTitle();
    $element = $web_driver->findElement(WebDriverBy::name("q"));
    if ($element) {
      $element->sendKeys("Browserstack");
      $element->submit();
    }
    $web_driver->quit();
  }
  public function testBrowserStack() {
    $url = "https://" . BROWSERSTACK_USERNAME . ":" . BROWSERSTACK_ACCESS_KEY . "@hub.browserstack.com/wd/hub";
    $caps = array(
      "build" => "Sample phpunit Tests",
      "name" => "phpunit parallel tests",
      "browser" => "Safari",
      "browser_version" => "9.0",
      "os" => "OS X",
      "os_version" => "El Capitan",
      "browserstack.debug" => "true"
    );
    $web_driver = RemoteWebDriver::create(
      $url,
      $caps
    );
    $web_driver->get("http://www.browserstack.com");
    print $web_driver->getTitle();
    $web_driver->quit();
  }
  public function testFacebook() {
    $url = "https://" . BROWSERSTACK_USERNAME . ":" . BROWSERSTACK_ACCESS_KEY . "@hub.browserstack.com/wd/hub";
    $caps = array(
      "build" => "Sample phpunit Tests",
      "name" => "phpunit parallel tests",
      "browser" => "edge",
      "browser_version" => "13.0",
      "os" => "Windows",
      "os_version" => "10",
      "browserstack.debug" => "true"
    );
    $web_driver = RemoteWebDriver::create(
      $url,
      $caps
    );
    $web_driver->get("http://www.facebook.com");
    print $web_driver->getTitle();
    $web_driver->quit();
  }
}
?>
