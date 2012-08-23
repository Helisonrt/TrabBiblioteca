<?php

namespace MRCartas;

use MRCartas\Carta;

/**
 * Test class for Baralho.
 * Generated by PHPUnit on 2012-05-23 at 19:43:39.
 */
class BaralhoTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Baralho
     */
    protected $baralho;

    /**
     * 
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->baralho = new Baralho;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers MRCartas\Baralho::addCartaBaralho
     * @todo Implement testAddCartaBaralho().
     * @author Rafael
     */
    public function testAddCartaBaralho() {
        $this->popularBaralho();
        $this->assertSame($this->baralho->getBaralho()[0]->getNaipe(), 'paus');
        $this->assertSame($this->baralho->getBaralho()[$this->baralho->count() - 1]->getNaipe(), 'copas');
    }

    /**
     * Testa o limite de cartas do baralho, se for excedido será lançada uma exceção
     * @covers MRCartas\Baralho::addCartaBaralho
     * @todo Implement testAddCartaBaralho().
     * @author Rafael
     * @expectedException MRCartas\BaralhoException
     */
    public function testAddLimiteCartas() {
        $this->popularBaralho();
        $this->baralho->addCartaBaralho(new Carta());
        $this->baralho->addCartaBaralho(new Carta());
    }

    private function popularBaralho() {
        $naipes = array('paus', 'ouro', 'espada', 'copas');
        $valores = array('A', 'K', 'Q', 'J', '10', '9', '8', '7', '6', '5', '4', '3', '2');
        foreach ($naipes as $naipe) {
            foreach ($valores as $value) {
                $carta = new \MRCartas\Carta();
                $carta->setNaipe($naipe);
                $carta->setValor($value);
                $this->baralho->addCartaBaralho($carta);
            }
        }
    }

    /**
     * @covers MRCartas\Baralho::count
     * @author Rafael
     */
    public function testCount() {
        $this->popularBaralho();
        $this->assertSame($this->baralho->count(), 52);
    }

    /**
     * Testa se o metodo RetiraCartaTopo() pega a carta certa
     *
     * @covers MRCartas\Baralho::retiraCartaTopo
     * @todo Implement testRetiraCartaTopo().
     * @author Bruno
     */
    public function testRetiraCartaTopo() {
        $this->popularBaralho();
        $cartaRemovida = $this->baralho->retiraCartaTopo();
        $this->assertSame($cartaRemovida->getNaipe(), 'copas');
        $this->assertSame($cartaRemovida->getValor(), '2');
    }

    /**
     * Testa se o metodo RetiraCartaFim() retira a carta desejada corretamente do fim do baralho
     *
     * @covers MRCartas\Baralho::retiraCartaFim
     * @todo Implement testRetiraCartaFim().
     * @author Bruno
     */
    public function testRetiraCartaFim() {
        $this->popularBaralho();
        $cartaRemovida = $this->baralho->retiraCartaFim();
        $this->assertSame($cartaRemovida->getNaipe(), 'paus');
        $this->assertSame($cartaRemovida->getValor(), '5');
    }

    /**
     * Testa o método divideBaralho() presente na classee Bararalho.php
     * Este método é responsavel por dividir o baralho em duas partes iguais
     * e fornecer um retorno contendo a segunda parte do baralho,
     * a qual sera manipulada posteriormente 
     * e atualize a primeira parte do mesmo.
     * 
     * @covers MRCartas\Baralho::divideBaralho
     * @todo Implement testDivideBaralho().
     * @author Juliano
     */
    public function testDivideBaralho() {

        $this->popularBaralho();
        $meioBaralho = $this->baralho->divideBaralho();

        /**
         * Verifica o tamanho do retorno do método divideBaralho. 
         */
        $numCartasMeioBaralho = count($meioBaralho);
        //$numCartasMeioBaralho = (strlen($meioBaralho)+1);

        /**
         * Verifica se o tamanho da parte 2 que é retornada 
         * é realmente 26(o meio do baralho). 
         */
        $this->assertSame($numCartasMeioBaralho, 26);

        $this->assertSame((($numCartasMeioBaralho) + 1), 26);
    }

    /**
     * @covers MRCartas\Baralho::embaralhaCartas
     * @todo Implement testEmbaralhaCartas().
     * @author
     */
    public function testEmbaralhaCartas() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * Testa se a carta passa do início do monte para o fim.
     * O teste ocorre com o baralho vazio, o baralho com apenas uma carta e o 
     * baralho com duas cartas.
     * @covers MRCartas\Baralho::passaCartaInicioFim
     * @todo Implement testPassaCartaInicioFim().
     * @author thiago
     */
    public function testPassaCartaInicioFim() {
        $baralho = new \MRCartas\Baralho();
        $baralho->passaCartaInicioFim();
        $this->assertEquals($baralho->getBaralho(), array());

        $asPaus = new \MRCartas\Carta('A', 'paus');
        $baralho->addCartaBaralho($asPaus);
        $baralho->passaCartaInicioFim();
        $this->assertEquals($baralho->getBaralho()[0], $asPaus);

        $dezOuro = new \MRCartas\Carta('10', 'ouro');
        $baralho->addCartaBaralho($dezOuro);
        $baralho->passaCartaInicioFim();
        $this->assertEquals($baralho->getBaralho()[1], $asPaus);
        $this->assertEquals($baralho->getBaralho()[0], $dezOuro);
    }

    /**
     * Testa se são retornadas as cartas do baralho corretamente.
     * @covers MRCartas\Baralho::getBaralho
     * @todo Implement testGetBaralho().
     * @author thiago
     */
    public function testGetBaralho() {
        $baralho = new \MRCartas\Baralho();
        $cartasAdd = array();
        $i = 0;
        $naipes = array('paus', 'ouro', 'espada', 'copas');
        $valores = array('A', 'K', 'Q', 'J', '10', '9', '8', '7', '6', '5', '4', '3', '2');
        foreach ($naipes as $naipe) {
            foreach ($valores as $value) {
                $carta = new \MRCartas\Carta();
                $carta->setNaipe($naipe);
                $carta->setValor($value);
                $baralho->addCartaBaralho($carta);
                $cartasAdd[$i] = $carta;
                $i++;

                $this->assertEquals($baralho->getBaralho(), $cartasAdd);
            }
        }
    }

    /**
     * @covers MRCartas\Baralho::setCartas
     * @todo Implement testSetCartas().
     * @author
     */
    public function testSetCartas() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}
