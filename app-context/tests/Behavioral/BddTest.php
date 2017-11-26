
<?php
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Behat\Behat\ApplicationFactory;
use Tests\TestCase;

class BehatTest extends TestCase
{
    /**
     * Run our Behat BDD tests through PHPUnit to be able to 
     * gather code coverage data on them
     */
    public function testRunBehat()
    {
        $behat = (new ApplicationFactory)->createApplication();
        $behat->setAutoExit(false);
        $input = new ArrayInput(['behat']);
        $output = new ConsoleOutput();
        $result = $behat->run($input, $output);
        $this->assertEquals(0, $result);
    }
}