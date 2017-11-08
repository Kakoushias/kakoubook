<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
	public function testAdd(){

		//add some items to the stack

    	$myBooks = new Books();

			$myBooks->push('A Dream of Spring');
			$myBooks->push('The Winds of Winter');
			$myBooks->push('A Dance with Dragons');
			$myBooks->push('A Feast for Crows');
			$myBooks->push('A Storm of Swords'); 
			$myBooks->push('A Clash of Kings');
			$myBooks->push('A Game of Thrones');
	}

	public function testRemove(){

		//add some items to the stack

    	$myBooks = new Books();

			echo $myBooks->pop(); // outputs 'A Game of Thrones'
			echo $myBooks->pop(); // outputs 'A Clash of Kings'
			echo $myBooks->pop(); // outputs 'A Storm of Swords'
	}

	public function testTop(){

		echo $myBooks->top(); // outputs 'A Feast for Crows'


	}


	
}
