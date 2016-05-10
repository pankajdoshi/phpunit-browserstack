# PHPUnit-Browserstack

Run [PHPUnit](https://github.com/sebastianbergmann/phpunit) scripts on BrowserStack.

## Usage

### Prerequisites

composer and php

### Clone the repo

`git clone https://github.com/browserstack/phpunit-browserstack.git`

### Install dependencies

Navigate to the root directory for testing and then install the dependencies by running

`composer install`

### BrowserStack Authentication

Export the environment variables for the username and access key of your BrowserStack account.
These can be found on the automate accounts page on [BrowserStack](https://www.browserstack.com/accounts/automate)

`export BROWSERSTACK_USERNAME=<browserstack-username>`

`export BROWSERSTACK_KEY=<browserstack-access-key>`

### Run the tests

 - To start a single test run: `composer test` or `composer test_single`
 - To start parallel tests run: `composer test_parallel`
 - To start local tests run: `composer test_local`

-----

#### Further Reading

- [PHPUnit](https://phpunit.de/)
- [BrowserStack documentation for Automate](https://www.browserstack.com/automate/php)

#### How to specify the capabilities

The [Code Generator](https://www.browserstack.com/automate/node#setting-os-and-browser) can come in very handy when specifying the capabilities especially for mobile devices.

Happy Testing!
