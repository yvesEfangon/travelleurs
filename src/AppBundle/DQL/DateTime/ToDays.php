<?php
/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 09/03/2017
 * Time: 16:33
 */

namespace AppBundle\DQL\DateTime;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;

/**
 * Class ToDays
 * @package AppBundle\DQL\DateTime
 */
class ToDays extends FunctionNode
{
    public $date        = null;

    /**
     * @param \Doctrine\ORM\Query\SqlWalker $sqlWalker
     * @return string
     */
    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        return 'TO_DAYS('.
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
