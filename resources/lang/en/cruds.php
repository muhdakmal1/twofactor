<?php

return [
    'ekadManagement' => [
        'title'          => 'eKad Management',
        'title_singular' => 'eKad Management',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'         => '',
            'email'             => 'Email',
            'email_helper'         => '',
            'url'               => 'Url',
            'url_helper'         => '',
        ],
        'kad_fields'=> [
            'id'                => 'ID',
            'intro_desc'         => 'Intro Description',
            'url_img'           => 'Url Image',
            'url_img_helper'    => '',
            'father_name'       => 'Father Name',
            'mother_name'       => 'Mother Name',
            'couple_name'       => 'Spouse Name',
            'location_short'    => 'Location',
            'date_event'        => 'Date Event',
            'time_event1'       => 'Time Event 1',
            'time_event2'       => 'Time Event 2',
            'time_event3'       => 'Time Event 3',
            'timedec_event1'    => 'Time Description Event 1',
            'timedec_event2'    => 'Time Description Event 2',
            'timedec_event3'    => 'Time Description Event 3',
            'contact_person1'   => 'Contact Person 1',
            'contact_no1'       => 'Contact No 1',
            'contact_relation1' => 'Contact Relation 1',
            'contact_person2'   => 'Contact Person 2',
            'contact_no2'       => 'Contact No 2',
            'contact_relation2' => 'Contact Relation 2',
            'contact_person3'   => 'Contact Person 3',
            'contact_no3'       => 'Contact No 3',
            'contact_relation3' => 'Contact Relation 3',
            'contact_person4'   => 'Contact Person 4',
            'contact_no4'       => 'Contact No 4',
            'contact_relation4' => 'Contact Relation 4',
            'music_id'          => 'Music',
            'googlemap_url'     => 'Google Map Url',
            'wazemap_url'       => 'Wazemap Url',
            'google_calendar'   => 'Google Calendar',
            'apple_calendar'    => 'Apple Calendar',
            'textUcapan'        => 'Text Ucapan',
        ],
    ],
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
];
