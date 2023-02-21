<?php

namespace qrb;

use qt\core\CPT as CoreCPT;

defined( 'ABSPATH' ) or exit;

class CPT extends CoreCPT {
    function register() {
        $this->create_post_type(
            'job',
            'jobs',
            'job-category',
        );

        $this->create_category(
            'job-category',
            'job',
            'Job'
        );

        
        $this->create_post_type(
            'experience',
            'experiences',
            'experience-category',
        );

        $this->create_category(
            'experience-category',
            'experience',
            'Experience'
        );


    }

    function register_meta() {
        // $this->add_meta( 'Resource type', 'resource', [
        //     $this->select( 'resource type', [
        //         'Blog'                  => 'Blog',
        //         'Instant VR workspaces' => 'Instant VR workspaces',
        //         'Video'                 => 'Video',
        //     ] ),
        // ] );
    }
}

?>