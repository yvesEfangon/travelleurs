<?php
/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 17/03/2017
 * Time: 17:46
 */

//TODO Classe à terminer!!
namespace AppBundle\DQL\String;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;

/**
 * Class IFDQL
 * @package AppBundle\DQL\String
 */
class IFDQL extends FunctionNode
{
    private $expression;
    private $operator;
    private $condition;
    private $value1;
    private $value2;

    /**
     * @param \Doctrine\ORM\Query\SqlWalker $sqlWalker
     * @return string
     */
    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        return 'IF('.
            $this->expression->dispatch($sqlWalker).
            $this->operator->dispatch($sqlWalker).
            $this->condition->dispatch($sqlWalker).','.
            $this->value1->dispatch($sqlWalker).','.
            $this->value2->dispatch($sqlWalker).
            ')';
    }

    /**
     * @param \Doctrine\ORM\Query\Parser $parser
     */
    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->expression       = $parser->StringExpression();
        $this->operator         = $parser->ComparisonOperator();//AggregateExpression();//StringExpression();

        $this->condition        = $parser->StringExpression();
        $parser->match(Lexer::T_COMMA);
        $this->value1       = $parser->StringExpression();
        $parser->match(Lexer::T_COMMA);
        $this->value2       = $parser->StringExpression();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}
