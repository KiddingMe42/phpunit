<?php
namespace App\Acme;

class Foo
{
    public function getName()
    {
        return 'Nginx PHP MySQL';
    }

    public function getSection($age)
    {
    	if ($age >= 18) {
    		return "majeur";
    	}
    	return "mineur";
    }
}
