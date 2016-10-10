<?php

use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Driver\Selenium2Driver;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    use \Laracasts\Behat\Context\Migrator;
    /**
     * @Given estou na página de login
     */
    public function estouNaPaginaDeLogin()
    {
        $this->visit('login');
    }

    /**
     * @When /^aguardo "(?<tempo>\d+)" segundos/i
     */
    public function aguardoSegundos($tempo)
    {
        sleep($tempo);
        var_dump($this->getSession()->getPage()->getContent());
    }

}
