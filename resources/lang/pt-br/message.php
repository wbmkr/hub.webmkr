<?php

return [
    'alerts' => [
        'success'   => 'Sucesso',
        'error'     => 'Erro',
        'info'      => 'Informa',
        'warning'   => 'Atenção',
    ],

    'form' => [
        'label' => [
            'email'                     => 'E-mail',
            'password'                  => 'Senha',
            'password_confirmation'     => 'Confirmar senha',
            'remember'                  => 'Lembrar-me neste computador',
            'forgot'                    => 'Esqueci minha senha',
            'signin'                    => 'Acessar',
            'send_link'                 => 'Enviar link',
            'reset'                     => 'Redefinir senha'
        ]
    ],

    'common' => [
        'label' => [
            'application'       => 'Painel de Controle',
            'caution_label'     => 'Atenção',
            'caution_message'   => 'Está area é restrita. Se você não é funcionário da :application com nível de acesso, por favor volte ao site imediatamente.',
            'search'            => 'Pesquisar',
            'save'              => 'Salvar',
            'search_result'     => '{0} Sua busca retornou nenhum resultado|{1} Sua busca retornou 1 resultado|[2,*] Sua busca retornou :total resultados ',
            'check_all'         => 'Marcar todos',
            'uncheck_all'       => 'Desmarcar todos'
        ],
        'alert' => [
            'success' => [
                'create'    => 'Item criado com sucesso.',
                'edit'      => 'Item editado com sucesso.',
                'delete'    => 'Item deletado com sucesso.'
            ],
            'error' => [
                'create'    => 'Ocorreu um erro ao tentar criar item, tente novamente.',
                'edit'      => 'Ocorreu um erro ao tentar editar item, tente novamente.',
                'delete'    => 'Ocorreu um erro ao tentar deletar item, tente novamente.'
            ]
        ],
    ],

    'pages' => [
        'auth' => [
            'signin' => [
                'meta_title'    => ':application :: Painel de controle | Login' ,
                'title'         => 'Acessar painel de controle'
            ],
            'passwords' => [
                'forgot'    => [
                    'meta_title'    => ':application :: Painel de controle | Esqueci minha senha',
                    'title'         => 'Esqueci minha senha',
                    'instruction'   => 'Informe seu e-mail abaixo para receber o link para redefinir sua senha.'
                ],
                'reset'    => [
                    'meta_title'    => ':application :: Painel de controle | Redefinir Senha',
                    'title'         => 'Redefinir senha',
                ],
            ]
        ],
        'dashboard' => [
            'title' => 'Dashboard'
        ],
        'settings' => [
            'title' => 'Configurações',
            'permissions' => [
                'title'     => 'Permissões',
                'name'      => 'Permissão',
                'new'       => 'Nova Permissão',
                'edit'      => 'Editar Permissão',
                'delete'    => 'Deletar Permissão',
                'action'    => [
                    'delete'    => 'Tem certeza que deseja deletar a permissão :permission',
                ],
                'label'    => [
                    'name'          => 'Nome',
                    'created_at'    => 'Criado em',
                ]
            ],
            'roles' => [
                'title'     => 'Cargos',
                'name'      => 'Cargo',
                'new'       => 'Novo Cargo',
                'edit'      => 'Editar Cargo',
                'delete'    => 'Deletar Cargo',
                'action'    => [
                    'delete'    => 'Tem certeza que deseja deletar o cargo :role',
                ],
                'label'    => [
                    'name'          => 'Nome',
                    'created_at'    => 'Criado em',
                    'permissions'   => 'Permissões'
                ]
            ],
            'admins' => [
                'title'     => 'Administradores',
                'name'      => 'Administrador',
                'new'       => 'Novo Administrador',
                'edit'      => 'Editar Administrador',
                'delete'    => 'Deletar Administrador',
                'action'    => [
                    'delete'    => 'Tem certeza que deseja deletar o administrador :admin',
                ],
                'label'    => [
                    'name'          => 'Nome',
                    'created_at'    => 'Criado em',
                    'role'          => 'Cargo',
                    'roles'         => 'Cargos',
                    'email'         => 'E-mail',
                    'permissions'   => 'Permissões',
                    'active'        => 'Administrador ativo',
                    'status'        => 'Status'
                ]
            ],  
        ]
    ],

    'mail' => [
        'regards'   => 'Atenciosamente',
        'subcopy'   => 'Se você está com problemas para clicar no botão ":actionText", copie e cole a URL abaixo em seu navegador: [:actionURL](:actionURL)',
        'copyright' => 'Todos os direitos reservados',
        'welcome' => [
            'subject'       => 'Novo administrador cadastrado :: :app',
            'greeting'      => 'Olá, :name',
            'line_one'      => 'Você está recebendo este e-mail pois você foi convidado para ser um dos administradores da plataforma :app.',
            'line_two'      => 'Para completar o seu cadastro, você precisa cadastrar uma senha de acesso clicando no botão abaixo.',
            'action'        => 'Cadastrar senha',
            'line_three'    => 'Se você não lembra de ter pedido um convite, nenhuma ação será necessaária.'
        ],
        'reset' => [
            'subject'   => 'Redefinir minha senha :: :app',
            'greeting'  => 'Olá!',
            'line_one'  => 'Você está recebendo este e-mail pois recebemos um pedido de redefinição de senha para sua conta',
            'action'    => 'Redefinir senha',
            'line_two'  => 'Se você não pediu para redefinir sua senha, nenhuma ação será necessária.'
        ]
    ],

    'navigation' => [
        'header' => [
            'view_website'  => 'Visualizar site',
            'edit_profile'  => 'Editar perfil',
            'logout'        => 'Sair'
        ],
        'main'  => [
            'dashboard'     => 'Dashboard',
            'settings'      => [
                'title'         => 'Configurações',
                'permissions'   => 'Permissões',
                'roles'         => 'Cargos',
                'admins'        => 'Administradores'
            ],
        ]
    ]
];