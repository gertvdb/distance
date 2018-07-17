<?php

namespace Drupal\distance;

/**
 * Interface for storing distance.
 */
interface DistanceInterface {

  /**
   * Provide distance in miles.
   *
   * @param int|null $decimals
   *   The number of decimals to show.
   *
   * @return float|null
   *   The distance in miles.
   */
  public function toMiles(int $decimals = NULL);

  /**
   * Provide distance in kilometres.
   *
   * @param int|null $decimals
   *   The number of decimals to show.
   *
   * @return float|null
   *   The distance in kilometres.
   */
  public function toKilometers(int $decimals = NULL);

  /**
   * Provide distance in nautical miles.
   *
   * @param int|null $decimals
   *   The number of decimals to show.
   *
   * @return float|null
   *   The distance in nautical miles.
   */
  public function toNauticalMiles(int $decimals = NULL);

}
