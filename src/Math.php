<?php
namespace Eewee;

class Math{
    public $aaa;

    /** @test */
    public static function double($nombre)
    {
        return $nombre*2;
    }
    public function majeur($a)
    {
    	if ($a >= 18) {
    		return true;
	    }
    	return false;
    }

    /**
     * @codeCoverageIgnoreee
     */
    public function aaa()
    {
        return true;
    }
}

// @codeCoverageIgnoreStart
if (false) { print '*'; }
// @codeCoverageIgnoreEnd

//print 'yo'; // @codeCoverageIgnore