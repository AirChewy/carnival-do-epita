<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class AirChewyPlayer
 * @package Hackathon\PlayerIA
 * @author AirChewy
 *
 */
class AirchewyPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -----------------------------
        //--------    -----------------------------------------------------

    /*    $opponentChoices =  $this->result->getChoicesFor($this->opponentSide);
        $paper = 0;
        $rock = 0;
        $scissor = 0;
        foreach ($opponentChoices as $choice) {
            if ($choice == 'paper')
                $paper += 1;
            elseif ($choice == 'scissor')
                $scissor += 1;
            elseif ($choice == 'rock')
                $rock +=1;
        }

        if ($paper > $rock) {
            if ($rock > $scissor)
                return $this->scissorsChoice();
            else
                return $this->rockChoice();
        }
        elseif ($paper > $scissor)
            return $this->scissorsChoice();
        else
            return $this->paperChoice();*/



        $myChoices =  $this->result->getChoicesFor($this->mySide);
        $paper = 0;
        $rock = 0;
        $scissor = 0;
        foreach ($myChoices as $choice) {
            if ($choice == 'paper')
                $paper += 1;
            elseif ($choice == 'scissor')
                $scissor += 1;
            elseif ($choice == 'rock')
                $rock +=1;
        }

        if ($paper > $rock) {
            if ($paper > $scissor)
                return $this->rockChoice();
            else
                return $this->paperChoice();
        }
        elseif ($rock > $scissor)
            return $this->scissorsChoice();
        else
            return $this->paperChoice();
    }

};
