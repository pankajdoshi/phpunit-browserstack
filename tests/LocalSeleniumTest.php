<?php
require 'vendor/autoload.php';
use BrowserStack\Local;

define('BROWSERSTACK_USERNAME', getenv('BROWSERSTACK_USERNAME'));
define('BROWSERSTACK_ACCESS_KEY', getenv('BROWSERSTACK_ACCESS_KEY'));

class SeleniumTest extends PHPUnit_Framework_TestCase {
  static $bs_local;

  public function __construct() {
    self::$bs_local = new Local();
  }

  public static function setUpBeforeClass() {
    $bs_local_args = array("key" => BROWSERSTACK_ACCESS_KEY, "forcelocal" => true);
    self::$bs_local->start($bs_local_args);
  }

  public function testGoogle() {
    $url = "https://" . BROWSERSTACK_USERNAME . ":" . BROWSERSTACK_ACCESS_KEY . "@hub.browserstack.com/wd/hub";
    $caps = array(
      "build" => "Sample phpunit Tests",
      "name" => "sample local phpunit tests",
      "browser" => "IE",
      "browser_version" => "9.0",
      "os" => "Windows",
      "os_version" => "7",
      "browserstack.local" => true,
      "browserstack.debug" => "true"
    );
    $web_driver = RemoteWebDriver::create(
      $url,
      $caps
    );
    $web_driver->get("http://www.google.com");
    echo $web_driver->getTitle();
    $element = $web_driver->findElement(WebDriverBy::name("q"));
    if ($element) {
      $element->sendKeys("Browserstack");
      $element->submit();
    }
    $web_driver->quit();
  }

  public static function tearDownAfterClass() {
    if(!is_null(self::$bs_local) && self::$bs_local->isRunning()) {
      self::$bs_local->stop();
    }
  }
}
?>
