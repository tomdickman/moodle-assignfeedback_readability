<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Calculator for determining various readability test scores.
 *
 * @package     assignfeedback_readability
 * @copyright   2019 Tom Dickman <tomdickman@catalyst-au.net>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace assignfeedback_readability;

use DaveChild\TextStatistics as TS;

defined('MOODLE_INTERNAL') || die();

/**
 * Calculator class for determining various readability test scores.
 *
 * @package     assignfeedback_readability
 * @copyright   2019 Tom Dickman <tomdickman@catalyst-au.net>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class calculator {

    /**
     * @var TS\TextStatistics instance to calculate scores from.
     */
    private $textstatistics;

    public function __construct() {
        $this->textstatistics = new TS\TextStatistics();
    }

    /**
     * Calculate test scores.
     *
     * @param string $text the text to calculate scores for.
     *
     * @return array
     */
    public function calculate_scores($text) {
        $results = [];

        $results['fleschkincaidreadingease'] = $this->textstatistics->fleschKincaidReadingEase($text);
        $results['fleschkincaidgradelevel'] = $this->textstatistics->fleschKincaidGradeLevel($text);
        $results['gunningfogscore'] = $this->textstatistics->gunningFogScore($text);
        $results['colemanliauindex'] = $this->textstatistics->colemanLiauIndex($text);
        $results['smogindex'] = $this->textstatistics->smogIndex($text);
        $results['automatedreadabilityindex'] = $this->textstatistics->automatedReadabilityIndex($text);
        $results['dalechallreadabilityscore'] = $this->textstatistics->daleChallReadabilityScore($text);
        $results['dalechalldifficultwordcount'] = $this->textstatistics->daleChallDifficultWordCount($text);
        $results['spachereadabilityscore'] = $this->textstatistics->spacheReadabilityScore($text);
        $results['spachedifficultwordcount'] = $this->textstatistics->spacheDifficultWordCount($text);
        $results['wordcount'] = $this->textstatistics->wordCount($text);
        $results['averagewordspersentence'] = round($this->textstatistics->averageWordsPerSentence($text), 2);

        return $results;
    }

}