<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel');
    }

    public function testOnlyAutenticatedUsersSeeProducts()
    {
        $this->visit('/produtos/listagem')
            ->see('login');
    }

    public function testLogin()
    {
        $this->visit('/produtos/listagem');
        $this
            ->submitForm('Login', ['email' => 'dacolera360@gmail.com', 'password' => '1q2w3e'])
            ->see('Buscar');
    }

    public function testClickHomeVoltaParaEscolhaSearchEngines()
    {
        $this->visit('/produtos/listagem');
        $this
            ->submitForm('Login', ['email' => 'dacolera360@gmail.com', 'password' => '1q2w3e'])
            ->click('Home')
            ->see('Escolha o estilo da busca de produtos:');
    }
}
