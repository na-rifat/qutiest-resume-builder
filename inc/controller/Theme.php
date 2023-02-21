<?php

namespace qrb;

use qt\core\Theme as CoreTheme;

defined( 'ABSPATH' ) or exit;

class Theme extends CoreTheme {
    function __construct() {
        $this->add_theme_option(
            'Resume settings',
            [
                'Jobs'        => [
                    $this->repeater(
                        'jobs',
                        [
                            $this->text( 'title' ),
                            $this->repeater(
                                'experiences',
                                [
                                    $this->textarea( 'summery' ),
                                ],
                                'vertical'
                            ),
                        ],
                    ),
                ],
                'Experiences' => [
                    $this->repeater(
                        'experiences',
                        [
                            $this->textarea( 'summery' ),
                        ],
                        'vertical'
                    ),
                ],
                'Degrees'     => [
                    $this->repeater(
                        'degrees',
                        [
                            $this->text( 'title' ),
                        ],
                        'vertical'
                    ),
                ],
            ]
        );
    }
}