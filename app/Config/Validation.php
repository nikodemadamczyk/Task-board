<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public array $spalten = [
        'boards_id' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Bitte wählen Sie ein Team aus.'
            ]
        ],
        'sort_id' => [
            'rules' => 'required|integer',
            'errors' => [
                'required' => 'Sort ID ist erforderlich.',
                'integer' => 'Sort ID muss eine ganze Zahl sein.'
            ]
        ],
        'spalte' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Spaltenbezeichnung ist erforderlich.'
            ]
        ],
        'spaltenbeschreibung' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Spaltenbeschreibung ist erforderlich.'
            ]
        ]
    ];

    public array $tasks = [
        'tasks' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Task-Bezeichnung ist erforderlich.'
            ]
        ]
    ];
}
