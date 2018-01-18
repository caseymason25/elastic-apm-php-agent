<?php
namespace PhilKra\Serializers;

use \PhilKra\Agent;
use \PhilKra\Helper\Config;

/**
 *
 * Base Class with Common Settings for the Serializers
 *
 */
class Entity {

  /**
   * @var \PhilKra\Helper\Config
   */
  protected $config;

  /**
   * @param Config $config
   * @param Store  $transactions
   */
  public function __construct( Config $config ) {
    $this->config = $config;
  }

  /**
   * Get the shared Schema Skeleton
   *
   * @return array
   */
  protected function getSkeleton() : array {
    return [
      'app' => [
        'name'    => $this->config->get( 'appName' ),
        'version' => $this->config->get( 'appVersion' ),
        'pid'     => getmypid(),
        'language' => [
          'name'    => 'php',
          'version' => PHP_RELEASE_VERSION
        ],
        'agent' => [
          'name'    => Agent::NAME,
          'version' => Agent::VERSION
        ]
      ],
      'system' => [
        'hostname'     => $this->config->get( 'hostname' ),
        'architecture' => php_uname( 'm' ),
        'platform'     => php_uname( 's' )
      ]
    ];
  }

}