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
     * @var string[]
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
    public $barang = [
        'nama' => [
            'rules' => 'required|min_length[5]',
        ],
        'harga' => [
            'rules' => 'required|integer',
        ],
        'jumlah'=>[
            'rules' => 'required|integer',
        ],
    ];
    
    public $barang_errors = [
        'nama' => [
            'required' =>'{field} Harus Diisi<br>',
            'min_length' => '{field} Minimal 5 Karakter<br>',
        ],
        'harga' => [
            'required' => '{field} Harus Diisi<br>',
            'integer' => '{field} Harus Angka<br>'
        ],
        'jumlah'=>[
            'required' => '{field} Harus Diisi<br>',
            'integer' => '{field} Harus Angka<br>'
        ],
    ];

    public $member = [
        'username' => [
            'rules' => 'required|min_length[5]',
        ],
        'role' => [
            'rules' => 'required|in_list[admin,user]',
        ],
        // 'is_aktif'=>[
        //     'rules' => 'required|integer',
        // ],
    ];
    
    public $member_errors = [
        'username' => [
            'required' =>'{field} Harus Diisi<br>',
            'min_length' => '{field} Minimal 5 Karakter<br>',
        ],
        'role' => [
            'required' => '{field} Harus Diisi<br>',
            'in_list' => '{field} Harus "admin" atau "user"<br>'
        ],
        // 'is_aktif'=>[
        //     'required' => '{field} Harus Diisi<br>',
        //     'integer' => '{field} Harus Angka<br>'
        // ],
    ];

    public $user = [
        'uname' => [
            'rules' => 'required|min_length[5]',
        ],
        'passw' => [
            'rules' => 'required|min_length[6]',
        ],
        'cpass' => [
            'rules' => 'required|matches[passw]',
        ],
    ];

    public $user_errors = [
        'uname' => [
            'required' =>'{field} Harus Diisi<br>',
            'min_length' => '{field} Minimal 5 Karakter<br>',
        ],
        'passw' => [
            'required' => '{field} Harus Diisi<br>',
            'min_length' => '{field} Minimal 6 Karakter<br>',
        ],
        'cpass' => [
            'required' => '{field} Harus Diisi<br>',
            'matches' => '{field} Password tidak sama<br>',
        ],
    ];
}
