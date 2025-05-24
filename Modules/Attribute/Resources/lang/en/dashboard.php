<?php

return [
    'attributes'  => [
        'datatable' => [
            'created_at'    => 'Created At',
            'date_range'    => 'Search By Dates',
            'options'       => 'Options',
            'status'        => 'Status',
            "type"         => "Type",
            'name'         => 'Name',
            "icon"      => "Icon",
            "order"     => "Orders",
            "options"     => "Options",
            "values"     => "Values",
            "show_in_search" => "Show in search",
            'description'         => 'Description',
        ],
        'form'      => [
            'name'         => 'name',
            'options'       => 'Options',
            'status'        => 'Status',
            'name'         => 'Name',
            'description'         => 'Description',
            'icon'         => 'icon',
            "type"         => "Type",
            "related_options"         => "Options",
            "related_attributes"         => "Related attributes",
            "allow_from_to"    => "Allow Range",

            "show_in_search" => "Show in search",

            "icom"      => "Icon",
            "order"     => "Orders",
            "options"     => "Options",
            "values"     => "Values",
            "validation"   => [
                "min"     => " min",
                "max"     => " max",
                "is_int"   => "is_int ",
                "validate_min" => "validate min",
                "validate_max" => "validate max  ",
                "required"     => "required"
            ],
            'tabs'              => [
                'general'   => 'General Info.',
                "validation" => "Validation"

            ],
        ],
        'routes'    => [
            'create'    => 'Create Attribute',
            'index'     => 'Attributes',
            'update'    => 'Update Attribute',
        ],

    ],

];
