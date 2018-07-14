<?php

namespace Drupal\distance;

/**
 * Interface for storing distance.
 */
interface DistanceInterface {

  /**
   * Provide distance in miles.
   *
   * @return float|null
   *   The distance in miles.
   */
  public function toMiles();

  /**
   * Provide distance in kilometres.
   *
   * @return float|null
   *   The distance in kilometres.
   */
  public function toKilometers();

  /**
   * Provide distance in nautical miles.
   *
   * @return float|null
   *   The distance in nautical miles.
   */
  public function toNauticalMiles();

}
