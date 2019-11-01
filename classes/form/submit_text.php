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
 * Form for submitting text for readability check.
 *
 * @package     assignfeedback_readability
 * @copyright   2019 Tom Dickman <tomdickman@catalyst-au.net>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace assignfeedback_readability;

use moodleform;

defined('MOODLE_INTERNAL') || die();

class submit_text extends moodleform {

    public function definition() {
        $mform = $this->_form;

        $mform->addElement('textarea', 'content', get_string('content', 'assignfeedback_readability'), ['rows' => 15, 'cols' => 40]);

        $this->add_action_buttons();
    }

}