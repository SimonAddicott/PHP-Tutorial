<?php
/**
 *
 *	Object Orientated TicTacToe Game
 *	Written by Simon Addicott
 *	Date 22/08/2022
 *
 */

class TicTacToe {

	/*
	 * array $table
	 */
	private $table = [3][3];
        
	/*
	 * array $userA
	 */
	private $userA = ["name" => "User One", "marker" => "X"];
        
	/*
         * array $userB 
         */
	private $userB = ["name" => "User Two", "marker" => "0"];

	/*
	 * boolean $userATurn 
	 */
	private $userATurn = true;

	private function printTable() {
		echo "- - - - - - - \n";
		echo " TIC TAC TOE\n";
		echo "- - - - - - - \n\n";
	
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
	
	private function clearScreen() {
		system("clear");
	}

	private function checkTableForWinner() {		

		// check vertical
		for($x = 0; $x < 3; $x++) { 
			if(!is_null($this->table[$x][0]) 
			&& $this->table[$x][0] == $this->table[$x][1] 
			&& $this->table[$x][1] == $this->table[$x][2]){
				$this->clearScreen();
                                $this->printTable($this->table);
				echo "User " . $this->table[$x][0] . " has won!\n\n";
                                return true;
			}
		}

		// check horizontal
                for($y = 0; $y < 3; $y++) {
                        if(!is_null($this->table[0][$y]) 
			&& $this->table[0][$y] == $this->table[1][$y] 
			&& $this->table[1][$y] == $this->table[2][$y]){
			        $this->clearScreen();
				$this->printTable($this->table);
				echo "User " . $this->table[$y][0] . " has won!\n\n";
                                return true;
                        }
                }
		
		// check diagonaly
		if(!is_null($this->table[0][0]) 
		    && $this->table[0][0] == $this->table[1][1] 
		    && $this->table[1][1] == $this->table[2][2]) {
			$this->clearScreen();
                        $this->printTable($this->table);
                        echo "User " . $this->table[0][0] . " has won!\n\n";	
			return true;
		} 
		if(!is_null($this->table[2][0])
                    && $this->table[2][0] == $this->table[1][1] 
                    && $this->table[1][1] == $this->table[0][2]) {
                        $this->clearScreen();
                        $this->printTable($this->table);
                        echo "User " . $this->table[2][0] . " has won!\n\n";  
                        return true;
                }
		return false;
	}
	
	public function __construct() {
		$userWon = false;
		while( $userWon == false ) {
			$this->clearScreen();
			$this->printTable();
			if( $userATurn == true ) {
				$this->getUserInput($this->userB);
				$userATurn = false;
			} else {
				$this->getUserInput($this->userA);
				$userATurn = true;
			}
			$userWon = $this->checkTableForWinner();
		}
	}
}

$game = new TicTacToe();

?>
