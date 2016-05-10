<?php
require 'vendor/autoload.php';

define('BROWSERSTACK_USERNAME', getenv('BROWSERSTACK_USERNAME'));
define('BROWSERSTACK_ACCESS_KEY', getenv('BROWSERSTACK_ACCESS_KEY'));

class SeleniumTest extends PHPUnit_Framework_TestCase {
  public function testGoogle() {
    $url = "https://" . BROWSERSTACK_USERNAME . ":" . BROWSERSTACK_ACCESS_KEY . "@hub.browserstack.com/wd/hub";
    $caps = array(
      "build" => "Sample phpunit Tests",
      "name" => "sample phpunit tests",
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
}
?>
