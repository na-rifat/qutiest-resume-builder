<?php

namespace qrb;

use qt\core\DB;
use qt\core\FUNC;

defined( 'ABSPATH' ) or exit;

class Resume {
    use FUNC;

    public function __construct() {

    }

    public const qrb_job_summeries = [
        'job'     => [
            'type' => 'text',
        ],
        'summery' => [
            'type' => 'text',
        ],
    ];

    public const qrb_jobs = [
        'title' => [
            'type' => 'text',
        ],
    ];

    public const qrb_self_summery = [

    ];

    public const qrb_skills = [
        'title' => [
            'type' => 'text',
        ],
    ];

    public function create_suggestion_tables() {
        // jobs
        DB::create_datatable( 'qrb_jobs', self::qrb_jobs );

        // job summeries
        DB::create_datatable( 'qrb_job_summeries', self::qrb_job_summeries );

        // skills
        DB::create_datatable( 'qrb_skills', self::qrb_skills );
    }

    public static function create_job() {
        return DB::create(
            'qrb_jobs',
            [
                'title' => self::var ( 'title' ),
            ]
        );
    }

    public static function delete_job() {
        return DB::delete( 'qrb_jobs', self::var ( 'id' ) );
    }

    public function create_job_summery() {
        return DB::create(
            'qrb_job_summeries',
            [
                'job'     => self::var ( 'job' ),
                'summery' => self::var ( 'summery' ),
            ]
        );
    }

    public static function get_job_list() {
        $jobs   = DB::retrieve( 'qrb_jobs' );
        $result = [];

        foreach ( $jobs as $job ) {
            $result[] = $job->title;
        }

        return $result;
    }

    public static function admin_job_list() {
        $jobs = DB::retrieve( 'qrb_jobs' );

        setData( $jobs );
        ob_start();
        self::_render_template( 'admin/list/jobs' );

        return ob_get_clean();
    }

    public static function admin_experience_list() {
        $experiences = DB::retrieve( 'qrb_job_summeries' );

        setData( $experiences );
        ob_start();
        self::_render_template( 'admin/list/experiences' );

        return ob_get_clean();
    }

    public static function get_job_summery_list( $job ) {
        return DB::retrieve(
            'qrb_job_summeries',
            $job,
            'job'
        );
    }

    public static function getJobSelect() {
        $jobs = DB::retrieve( 'qrb_jobs' );

        ob_start();
        foreach ( $jobs as $job ) {
            printf( '<option value="%s">%s</option>', $job->title, $job->title );
        }

        return ob_get_clean();
    }

    public static function create_experience() {
        return DB::create(
            'qrb_job_summeries',
            [
                'job'     => self::var ( 'job' ),
                'summery' => self::var ( 'summery' ),
            ]
        );
    }

    public static function get_experience_list() {
        $experiences = DB::retrieve( 'qrb_job_summeries', self::var ( 'job' ), 'job' );
        $result      = [];

        foreach ( $experiences as $experience ) {
            $result[] = $experience->summery;
        }

        return $result;
    }

}