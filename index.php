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
 * Moodle internal endpoint for assignfeedback_readability plugin.
 *
 * @package     assignfeedback_readability
 * @copyright   2019 Tom Dickman <tomdickman@catalyst-au.net>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../../../config.php');
require_once(__DIR__ . '/vendor/autoload.php');

$url = new moodle_url('/mod/assign/feedback/readability/index.php');

$PAGE->set_context(context_system::instance());
$PAGE->set_url($url);
$PAGE->set_pagelayout('standard');
$PAGE->set_title(get_string('pluginname', 'assignfeedback_readability'));
$PAGE->navbar->add(get_string('pluginname', 'assignfeedback_readability'), $url);

require_login();
require_capability('mod/assign:view', context_system::instance());

$form = new \assignfeedback_readability\form\submit_text();

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('pluginname', 'assignfeedback_readability'));

if ($data = $form->get_data()) {

    $calculator = new \assignfeedback_readability\calculator();
    $scores = $calculator->calculate_scores($data->content);

    echo $OUTPUT->box_start('generalbox');

    $table = new html_table();
    $table->head  = [get_string('name', 'assignfeedback_readability'),
        get_string('value', 'assignfeedback_readability')];
    $table->colclasses = ['text-left', 'text-center'];
    $table->id = 'readabilityscores';
    $table->attributes['class'] = 'generaltable';
    $table->data  = [];

    foreach ($scores as $name => $score) {
        $table->data[] = [get_string($name, 'assignfeedback_readability'), $score];
    }
    
    echo html_writer::table($table);
    $cancelbutton = new single_button($url, get_string('cancel'));
    echo $OUTPUT->render($cancelbutton);
    echo $OUTPUT->box_end();

} else {
    $form->display();
}

echo $OUTPUT->footer();
