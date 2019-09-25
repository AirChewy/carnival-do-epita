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

    protected $myLastChoice = "";
    protected $myPaper = 0;
    protected $myRock = 0;
    protected $myScissors = 0;

    protected $isFirstRound = true;

    protected $lastOpponentChoice = "";
    protected $opponentPaper = 0;
    protected $opponentRock = 0;
    protected $opponentScissors = 0;

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


        $currentOpponentChoice = $this->result->getLastChoiceFor($this->opponentSide);
        $myCurrentChoice = $this->result->getLastChoiceFor($this->mySide);

        switch ($currentOpponentChoice) {
            case "paper":
                $this->opponentPaper++;
                break;

            case "rock":
                $this->opponentRock++;
                break;

            case "scissors":
                $this->opponentScissors++;
                break;
        }

        switch ($myCurrentChoice) {
            case "paper":
                $this->myPaper++;
                break;

            case "rock":
                $this->myRock++;
                break;

            case "scissors":
                $this->myScissors++;
                break;
        }

        if ($this->isFirstRound == true) {
            $this->isFirstRound = false;
            return $this->rockChoice();
        }

        if ($currentOpponentChoice == $this->lastOpponentChoice) {
            switch ($currentOpponentChoice) {
                case "paper":
                    return $this->rockChoice();
                    break;

                case "rock":
                    return $this->scissorsChoice();
                    break;

                case "scissors":
                    return $this->paperChoice();
                    break;
            }
        }

        $lastOpponentScore = $this->result->getLastScoreFor($this->opponentSide);

        if ($lastOpponentScore == 0) {
            switch ($currentOpponentChoice) {
                case "paper":
                    return $this->RockChoice();
                    break;

                case "rock":
                    return $this->scissorsChoice();
                    break;

                case "scissors":
                    return $this->paperChoice();
                    break;
            }
        }
        else {
            if ($this->opponentPaper > $this->opponentRock) {
                if ($this->opponentRock > $this->opponentScissors)
                    return $this->rockChoice();
                else
                    return $this->paperChoice();
            }
            elseif ($this->opponentPaper > $this->opponentScissors)
                return $this->scissorsChoice();
            else
                return $this->paperChoice();
        }



    }

};
