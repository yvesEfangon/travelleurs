<?php
/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 09/03/2017
 * Time: 13:49
 * WEEK(DateTime)
 */

namespace AppBundle\DQL\DateTime;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\SqlWalker;
use Doctrine\ORM\Query\Parser;

/**
 * Class Week
 * @package AppBundle\DQL\DateTime
 */
class Week extends FunctionNode
{
    public $date    = null;
    public $mode    = null;

    /**
     * @param SqlWalker $sqlWalker
     * @return string
     */
    public function getSql(SqlWalker $sqlWalker)
    {
        return 'WEEK('.
            $this->date->dispatch($sqlWalker).','.
            $this->mode->dispatch($sqlWalker).
            ')';
    }

    /**
     * @param Parser $parser
     */
    public function parse(Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->date      = $parser->StringExpression();
        $parser->match(Lexer::T_COMMA);
        $this->mode      = $parser->ArithmeticExpression();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}
