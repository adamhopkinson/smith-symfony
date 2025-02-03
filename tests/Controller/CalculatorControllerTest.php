<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalculatorControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();

        // Request the calculator page and validate success & heading
        $crawler = $client->request('GET', '/calculator');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Calculator');

        // Submit the calculator form and validate success & response
        $form = $crawler->filter('[type=submit]')->form();
        $form->setValues([
            'calculator[value1]' => 10,
            'calculator[operator]' => '*',
            'calculator[value2]' => 10,
        ]);
        $client->submit($form);
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('#result', 'Result: 100');

        // Submit the calculator form with a divide by zero and assert 0
        $form = $crawler->filter('[type=submit]')->form();
        $form->setValues([
            'calculator[value1]' => 10,
            'calculator[operator]' => '/',
            'calculator[value2]' => 0,
        ]);
        $client->submit($form);
        $this->assertResponseStatusCodeSame(422);
        $this->assertSelectorTextContains('#calculator', 'Please avoid dividing by zero!');

        // Assert max 3 decimal places
        $form = $crawler->filter('[type=submit]')->form();
        $form->setValues([
            'calculator[value1]' => 1,
            'calculator[operator]' => '/',
            'calculator[value2]' => 6,
        ]);
        $client->submit($form);
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('#result', 'Result: 0.167');
    }
}
