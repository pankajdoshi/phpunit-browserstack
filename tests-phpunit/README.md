# Documentation to write simple tests in PHP

1. Install composer on your computer. Please follow instructions given on http://getcomposer.org/doc/00-intro.md. For this documentation composer.phar was renamed as composer and placed in /usr/local/bin(could be placed in any folder included in system path).
2. In your composer.json add enteries for phpunit and webdriver. This composer.json should be placed in project root and should look like:
```
{
  "require": {
    "phpunit/phpunit-selenium": "dev-master",
    "facebook/webdriver": "dev-master"
    }
}
```
for php5.4+ please use dev-master version of facebook/webdriver and for php versions less then 5.3 please use facebook/webdriver version 0.1.
3. Install dependencies using composure. Please call bellow command in the project root containing composer.json
```
composer install
```
4. Or we can update dependencies using 
```
composer update
```
5. Create test folder in project root if not present and then create SeleniumTest.php with following code in test folder
```
<?php
require 'vendor/autoload.php';
define('BROWSERSTACK_USER', 'BROWSERSTACK_USERNAME');
define('BROWSERSTACK_KEY', 'BROWSERSTACK_KEY');
class WebTest extends PHPUnit_Extensions_Selenium2TestCase
{
  public static $browsers = array(
    array(
      'browserName' => 'chrome',
      'host' => 'hub.browserstack.com',
      'port' => 80,
      'desiredCapabilities' => array(
        'version' => '30',
        'browserstack.user' => BROWSERSTACK_USER,
        'browserstack.key' => BROWSERSTACK_KEY,
        'os' => 'OS X',
        'os_version' => 'Mountain Lion'   
      )
    ),
    array(
      'browserName' => 'chrome',
      'host' => 'hub.browserstack.com',
      'port' => 80,
      'desiredCapabilities' => array(
        'version' => '30',
        'browserstack.user' => BROWSERSTACK_USER,
        'browserstack.key' => BROWSERSTACK_KEY,
        'os' => 'Windows',
        'os_version' => '8.1'   
      )
    )
    );   
    protected function setUp()
    {
        parent::setUp();
        $this->setBrowserUrl('http://www.example.com/');
    }
 
    public function testTitle()
    {
        $this->url('http://www.example.com/');
        $this->assertEquals('Example Domain', $this->title());
    }
    public function testGoogle()
    {
        $this->url('http://www.google.com/');
        $element = $this->byName('q');
        $element->click();
        $this->keys('Browserstack');
        $button = $this->byName('btnG');
        $button->click();
        $this->assertEquals('Browserstack - Google zoeken', $this->title());
    }
}
?>
``` 
6. Replace BROWSERSTACK_KEY and BROWSERSTACK_USERNAME with your BrowserStack Username and access key to run the tests. 
To run this UnitTests in please call following command:
```
vendor/bin/phpunit test/
```