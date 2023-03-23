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
 * Google Rest API.
 *
 * @package     mod_googlemeet
 * @copyright   2023 Rone Santos <ronefel@hotmail.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace mod_googlemeet;

defined('MOODLE_INTERNAL') || die();

/**
 * Google Rest API.
 *
 * @copyright   2023 Rone Santos <ronefel@hotmail.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class rest extends \core\oauth2\rest {

    /**
     * Define the functions of the rest API.
     *
     * @return array
     */
    public function get_api_functions() {
        return [
            'insertevent' => [
                'endpoint' => 'https://www.googleapis.com/calendar/v3/calendars/{calendarid}/events',
                'method' => 'post',
                'args' => [
                    'end' => [
                        'dateTime' => PARAM_RAW,
                        'timeZone' => PARAM_TIMEZONE
                    ],
                    'start' => [
                        'dateTime' => PARAM_RAW,
                        'timeZone' => PARAM_TIMEZONE
                    ],
                    'summary' => PARAM_RAW,
                    'recurrence' => [
                        PARAM_RAW
                    ]
                ],
                'response' => 'json'
            ],
            'createconference' => [
                'endpoint' => 'https://www.googleapis.com/calendar/v3/calendars/{calendarid}/events/{eventid}',
                'method' => 'patch',
                'args' => [
                    'conferenceData' => [
                        'createRequest' => [
                            'requestId' => PARAM_RAW
                        ]
                    ]
                ],
                'response' => 'json'
            ],
            'list' => [
                'endpoint' => 'https://www.googleapis.com/drive/v3/files',
                'method' => 'get',
                'args' => [
                    'fields' => PARAM_RAW,
                    'pageSize' => PARAM_INT,
                    'q' => PARAM_RAW
                ],
                'response' => 'json'
            ],
        ];
    }
}
