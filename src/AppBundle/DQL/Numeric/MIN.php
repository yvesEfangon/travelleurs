<?php
/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 09/03/2017
 * Time: 16:33
 */

namespace AppBundle\DQL\Numeric;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;

/**
 * Class MIN
 * @package AppBundle\DQL\Numeric
 */
class MIN extends FunctionNode
{
    public $numeric        = null;

    /**
     * @param \Doctrine\ORM\Query\SqlWalker $sqlWalker
     * @return string
     */
    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        return 'MIN('.$this->numeric->dispatch($sqlWalker).')';
    }

    /**
     * @param \Doctrine\ORM\Query\Parser $parser
     */
    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->numeric      = $parser->StringExpression();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}
