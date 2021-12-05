<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert as Assertions;
use App\Http\Controllers\PostController;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $controller;
    private $post;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->controller = new PostController;
    }
    
    /**
     * @When I request a post :arg1
     */
    public function iRequestAPost($arg1)
    {
        $arg1 = 1;
        $this->post = $this->controller->show($arg1);
    }

    /**
     * @Then I get a :arg1 response
     */
    public function iGetAResponse($arg1)
    {
        Assertions::assertSame(
            "200",
            $this->post->status
            );
    }

    /**
     * @Then scope into the :arg1 property
     */
    public function scopeIntoTheProperty($arg1)
    {
        Assertions::assertSame(
            true,
            isset($this->post->data)
            );
    }

    /**
     * @Then the properties exist
     */
    public function thePropertiesExist(PyStringNode $string)
    {
        Assertions::assertSame(
            true,
            isset($this->post->data->id)
            );
        Assertions::assertSame(
            true,
            isset($this->post->data->name)
            );
    }

    /**
     * @Then the id :arg1 property is an integer
     */
    public function theIdPropertyIsAnInteger($arg1)
    {
        Assertions::assertIsInt($this->post->data);
    }
}
