<?php

require_once __DIR__.'/../../vendor/autoload.php';

class PrestashopBackOfficeTest extends Sauce\Sausage\WebDriverTestCase
{
    protected $base_url;

    public static $browsers = array(
        array(
            'browserName' => 'chrome',
            'desiredCapabilities' => array(
                'platform' => 'Linux',
            ),
        ),
    );

    public function __construct()
    {
        parent::__construct();

        $this->base_url = sprintf('%s://%s%s',
            getenv('TEST_PROTO'),
            getenv('TEST_HOST'),
            rtrim(getenv('TEST_BASE_DIR'), '/')
        );
    }

    public function setUpPage()
    {
        $this->timeouts()->implicitWait(10000);
        $this->timeouts()->asyncScript(10000);

        $this->url($this->base_url);
    }

    public function testBackOfficeTitle()
    {
        $this->url('/_admin/');

        $this->assertContains('Administration panel', $this->title());
    }
}