<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameResultsController extends Controller
{
    /**
     * Returns an array of game results data
     *
     * @return Array $results
     */
    public function getData()
    {
        //scores out of 20
        //can change these scores to affect color and progress bar percent
        //default scores
        $breakaway_score = 11;
        $effeciency_score = 14;
        $techincal_skills_score = 15;
        $accuracy_score = 19;

        //test scores
        // $breakaway_score = 19;
        // $effeciency_score = 11;
        // $techincal_skills_score = 5;
        // $accuracy_score = 12;

        //ttc out of 10 mins (600 secs), can change this as well (default 222)
        $time_to_complete_secs = 150;
        $mins_secs_string = $this->secToMin($time_to_complete_secs);

        //array holding all the data for the score breakdown
        $game_stats = [
            [
                'title' => "Breakaway Capability - {$breakaway_score}/20",
                'color' => "",
                'value' => round($breakaway_score/20*100)
            ],
            [
                'title' => "Effeciency - {$effeciency_score}/20",
                'color' => "",
                'value' =>  round($effeciency_score/20*100)
            ],
            [
                'title' => "Time To Completition - {$mins_secs_string} (10 minutes allowed)",
                'color' => "",
                'value' => round($time_to_complete_secs/600*100)
            ],
            [
                'title' => "Techincal Skills - {$techincal_skills_score}/20",
                'color' => "",
                'value' => round($techincal_skills_score/20*100)
            ],
            [
                'title' => "Accuracy - {$accuracy_score}/20",
                'color' => "",
                'value' => round($accuracy_score/20*100)
            ]
        ];

        //change color depending on value
        //above 90% #06bdad - greenish blue
        //75% - 89% #e8da13 - yellowish
        //40% - 74% #ed9015 - orangey
        //below 40% #fa194a - redish pink
        $total_percent = 0;
        foreach($game_stats as &$stat) {
            $total_percent += $stat["value"];
            $stat["color"] = $this->valueToColor($stat["value"]);
        }

        $avg_score = round($total_percent/5);
        $avg_score_color = $this->valueToColor($avg_score);

        $avg_stats = [
            'value' => $avg_score,
            'color' => $avg_score_color
        ];

        $data = [
            'game_stats' => $game_stats,
            'avg_stats' => $avg_stats
        ];

        return $data;
    }

    //convert seconds to sec/mins string
    function secToMin($seconds) {
        $minutes = floor(($seconds / 60) % 60);
        $seconds = $seconds % 60;
        return "{$minutes} minutes {$seconds} seconds";
      }

    //find color for progress bar, depending on passed in
    function valueToColor($value) {
        if($value < 40) {
            return "#fa194a";

        }elseif($value < 75) {
            return "#ed9015";

        }elseif($value < 90) {
            return "#e8da13";

        }else{
            return "#06bdad";
        }
    }
}
