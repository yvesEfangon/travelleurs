<?php
/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 06/09/2017
 * Time: 22:47
 */

namespace AppBundle\DQL\Numeric;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\SqlWalker;

class ROUND extends FunctionNode
{

    private $arithmeticExpression;

    public function getSql(SqlWalker $sqlWalker)
    {

        return 'ROUND(' . $sqlWalker->walkSimpleArithmeticExpression(
                $this->arithmeticExpression
            ) . ')';
    }

    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {

        $lexer = $parser->getLexer();

        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);

        $this->arithmeticExpression = $parser->SimpleArithmeticExpression();

        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}