<?php
/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 09/03/2017
 * Time: 14:11
 */

namespace AppBundle\DQL\String;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;

/**
 * Class Truncate
 * @package AppBundle\DQL\String
 */
class Truncate extends FunctionNode
{
    public $string  = null;
    public $digits  = null;

    /**
     * @param \Doctrine\ORM\Query\SqlWalker $sqlWalker
     * @return string
     */
    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        return 'TRUNCATE('.
            $this->string->dispatch($sqlWalker).','.
            $this->digits->dispatch($sqlWalker).
            ')';
    }

    /**
     * @param \Doctrine\ORM\Query\Parser $parser
     */
    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->string      = $parser->StringExpression();
        $parser->match(Lexer::T_COMMA);
        $this->digits      = $parser->ArithmeticExpression();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}
