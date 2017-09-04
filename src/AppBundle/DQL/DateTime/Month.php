<?php
/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 09/03/2017
 * Time: 14:35
 */

namespace AppBundle\DQL\DateTime;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;

/**
 * Class Month
 * @package AppBundle\DQL\DateTime
 */
class Month extends FunctionNode
{
    public $date        = null;

    /**
     * @param \Doctrine\ORM\Query\SqlWalker $sqlWalker
     * @return string
     */
    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        return 'MONTH('.
            $this->date->dispatch($sqlWalker).
            ')';
    }

    /**
     * @param \Doctrine\ORM\Query\Parser $parser
     */
    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->date      = $parser->StringExpression();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}
