<?php

namespace Drupal\distance;

/**
 * Distance.
 *
 * A coordinate object to store coordinates.
 */
final class Distance implements DistanceInterface {

  // Setup constants.
  const ONE_KILOMETRE_IN_MILES = 1.609344;
  const ONE_NAUTICAL_MILE_IN_MILES = 1.15077945;
  const UNITS = [
    'KM',
    'MI',
    'NMI',
  ];

  /**
   * The distance.
   *
   * @var float|null
   */
  protected $distance;

  /**
   * Constructor.
   *
   * @param float $distance
   *   The distance in a supported unit.
   * @param string $unit
   *   The unit.
   */
  public function __construct(float $distance = NULL, string $unit) {

    // Make sure a valid unit is passed.
    if (!in_array($unit, self::UNITS)) {
      throw new \Exception(t('The provided unit is not supported'));
    }

    // Convert the distance to miles on initialisation.
    // This way we have a fixed value to work with.
    switch ($unit) {
      case 'KM':
        $this->distance = $distance / self::ONE_KILOMETRE_IN_MILES;
        break;

      case 'NMI':
        $this->distance = $distance / self::ONE_NAUTICAL_MILE_IN_MILES;
        break;

      case 'MI':
        $this->distance = $distance;
        break;

    }
  }

  /**
   * Provide distance in miles.
   *
   * @param int $decimals
   *   The number of decimals to show.
   *
   * @return float|null
   *   The distance in miles.
   */
  public function toMiles(int $decimals = NULL) {
    return !$decimals ? $this->distance : round($this->distance, $decimals);
  }

  /**
   * Provide distance in kilometres.
   *
   * @param int $decimals
   *   The number of decimals to show.
   *
   * @return float|null
   *   The distance in kilometres.
   */
  public function toKilometers(int $decimals = NULL) {
    return !$decimals ? $this->distance * self::ONE_KILOMETRE_IN_MILES : round($this->distance * self::ONE_KILOMETRE_IN_MILES, $decimals);
  }

  /**
   * Provide distance in nautical miles.
   *
   * @param int $decimals
   *   The number of decimals to show.
   *
   * @return float|null
   *   The distance in nautical miles.
   */
  public function toNauticalMiles(int $decimals = NULL) {
    return !$decimals ? $this->distance * self::ONE_NAUTICAL_MILE_IN_MILES : round($this->distance * self::ONE_NAUTICAL_MILE_IN_MILES, $decimals);
  }

}
