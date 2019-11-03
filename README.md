## Moodle Readability Plugin

This assignment feedback plugin is designed to users to check the readability of an assignment to determine how difficult it is to comprehend and understand.

### Installation

This plugin uses Composer in order to load required external libraries on installation for the scoring of text readability.

1. Install Composer on your Moodle server (details of how to do this can be found [here](https://getcomposer.org/doc/00-intro.md) with Moodle specific details [here](https://docs.moodle.org/dev/Composer).)
2. On Moodle server (where `moodlepath` is the root directory of your Moodle codebase):

    - `cd /moodlepath/mod/assign/feedback/readability` 
    
    - `php composer.phar install`
    
3. You should now have the plugin dependencies installed correctly.

### License

This plugin utilises Dave Child's [Text-Statistics API](https://github.com/DaveChild/Text-Statistics) which is licensed under the [2 Clause BSD license](http://www.opensource.org/licenses/bsd-license.php).

This plugin itself is licensed under the [GPL 3.0](https://www.gnu.org/licenses/gpl-3.0.html) license as a plugin intended for use in a Moodle instance.
