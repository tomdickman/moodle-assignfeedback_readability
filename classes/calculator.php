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
     * @var DaveChild\TextStatistics instance to calculate scores from.
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

        return $results;
    }

}