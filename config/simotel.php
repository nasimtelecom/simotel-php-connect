<?php

return [
    'smartApi' => [
        'apps' => [
            '*' => "\App\Simotel\SmartApiApp",
        ],
    ],
    'ivrApi' => [
        'apps' => [
            '*' => "\App\Simotel\IvrApiApp",
        ],
    ],
    'trunkApi' => [
        'apps' => [
            '*' => "\App\Simotel\TrunkApiApp",
        ],
    ],
    'extensionApi' => [
        'apps' => [
            '*' => "\App\Simotel\ExtensionApiApp",
        ],
    ],
    'simotelApi' => [
        'connect' => [
            'user' => 'apiUser',
            'pass' => 'apiPass',
            'token' => 'apiToken',
            'server_address' => 'http://simotelServer',

        ],
        'methods' => [
            'pbx_users_add' => [
                'address' => 'pbx/users/add',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_users_update' => [
                'address' => 'pbx/users/update',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_users_remove' => [
                'address' => 'pbx/users/remove',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_users_search' => [
                'address' => 'pbx/users/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_trunks_add' => [
                'address' => 'pbx/trunks/add',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_trunks_update' => [
                'address' => 'pbx/trunks/update',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_trunks_remove' => [
                'address' => 'pbx/trunks/remove',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_trunks_search' => [
                'address' => 'pbx/trunks/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_queues_add' => [
                'address' => 'pbx/queues/add',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_queues_update' => [
                'address' => 'pbx/queues/update',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_queues_remove' => [
                'address' => 'pbx/queues/remove',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_queues_search' => [
                'address' => 'pbx/queues/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_queues_addagent' => [
                'address' => 'pbx/queues/addagent',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_queues_removeagent' => [
                'address' => 'pbx/queues/removeagent',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_queues_pauseagent' => [
                'address' => 'pbx/queues/pauseagent',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_queues_resumeagent' => [
                'address' => 'pbx/queues/resumeagent',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_blacklists_add' => [
                'address' => 'pbx/blacklists/add',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_blacklists_update' => [
                'address' => 'pbx/blacklists/update',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_blacklists_remove' => [
                'address' => 'pbx/blacklists/remove',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_blacklists_search' => [
                'address' => 'pbx/blacklists/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_whitelists_add' => [
                'address' => 'pbx/whitelists/add',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_whitelists_update' => [
                'address' => 'pbx/whitelists/update',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_whitelists_remove' => [
                'address' => 'pbx/whitelists/remove',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_whitelists_search' => [
                'address' => 'pbx/whitelists/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_announcements_upload' => [
                'address' => 'pbx/announcements/upload',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_announcements_add' => [
                'address' => 'pbx/announcements/add',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_announcements_update' => [
                'address' => 'pbx/announcements/update',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_announcements_remove' => [
                'address' => 'pbx/announcements/remove',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_announcements_search' => [
                'address' => 'pbx/announcements/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_musiconholds_search' => [
                'address' => 'pbx/musiconholds/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_faxes_upload' => [
                'address' => 'pbx/faxes/upload',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_faxes_add' => [
                'address' => 'pbx/faxes/add',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_faxes_search' => [
                'address' => 'pbx/faxes/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'pbx_faxes_download' => [
                'address' => 'pbx/faxes/download',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'call_originate_act' => [
                'address' => 'call/originate/act',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'voicemails_voicemails_add' => [
                'address' => 'voicemails/voicemails/add',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'voicemails_voicemails_update' => [
                'address' => 'voicemails/voicemails/update',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'voicemails_voicemails_remove' => [
                'address' => 'voicemails/voicemails/remove',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'voicemails_voicemails_search' => [
                'address' => 'voicemails/voicemails/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'voicemails_audio_download' => [
                'address' => 'voicemails/audio/download',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'voicemails_inbox_search' => [
                'address' => 'voicemails/inbox/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'reports_quick_search' => [
                'address' => 'reports/quick/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'reports_quick_info' => [
                'address' => 'reports/quick/info',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'reports_audio_download' => [
                'address' => 'reports/audio/download',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'reports_cdr_search' => [
                'address' => 'reports/cdr/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'reports_queue_search' => [
                'address' => 'reports/queue/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'reports_queue_details_search' => [
                'address' => 'reports/queue_details/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'reports_agent_search' => [
                'address' => 'reports/agent/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'reports_poll_search' => [
                'address' => 'reports/poll/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_announcements_upload' => [
                'address' => 'autodialer/announcements/upload',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_announcements_add' => [
                'address' => 'autodialer/announcements/add',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_announcements_update' => [
                'address' => 'autodialer/announcements/update',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_announcements_remove' => [
                'address' => 'autodialer/announcements/remove',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_announcements_search' => [
                'address' => 'autodialer/announcements/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_campaigns_add' => [
                'address' => 'autodialer/campaigns/add',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_campaigns_update' => [
                'address' => 'autodialer/campaigns/update',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_campaigns_remove' => [
                'address' => 'autodialer/campaigns/remove',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_campaigns_search' => [
                'address' => 'autodialer/campaigns/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_contacts_add' => [
                'address' => 'autodialer/contacts/add',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_contacts_update' => [
                'address' => 'autodialer/contacts/update',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_contacts_remove' => [
                'address' => 'autodialer/contacts/remove',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_contacts_search' => [
                'address' => 'autodialer/contacts/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_groups_upload' => [
                'address' => 'autodialer/groups/upload',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_groups_add' => [
                'address' => 'autodialer/groups/add',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_groups_update' => [
                'address' => 'autodialer/groups/update',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_groups_remove' => [
                'address' => 'autodialer/groups/remove',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_groups_search' => [
                'address' => 'autodialer/groups/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_reports_search' => [
                'address' => 'autodialer/reports/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_reports_info' => [
                'address' => 'autodialer/reports/info',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_trunks_update' => [
                'address' => 'autodialer/trunks/update',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
            'autodialer_trunks_search' => [
                'address' => 'autodialer/trunks/search',
                'request_method' => 'PUT',
                'default_request_data' => [],
            ],
        ],
    ],
];
