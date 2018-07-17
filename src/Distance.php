<?php

namespace Drupal\distance;

/**
 * Distance.
 *
 * A distance object to store a distance.
 */
final class Distance implements DistanceInterface {

  // Setup constants for calculations.
  const ONE_KILOMETRE_IN_MILES = 1.609344;
  const ONE_NAUTICAL_MILE_IN_MILES = 1.15077945;

  // Setup supported distance units.
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
   * {@inheritdoc}
   */
  public function toMiles(int $decimals = NULL) {
    return !$decimals ? $this->distance : round($this->distance, $decimals);
  }

  /**
   * {@inheritdoc}
   */
  public function toKilometers(int $decimals = NULL) {
    return !$decimals ? $this->distance * self::ONE_KILOMETRE_IN_MILES : round($this->distance * self::ONE_KILOMETRE_IN_MILES, $decimals);
  }

  /**
   * {@inheritdoc}
   */
  public function toNauticalMiles(int $decimals = NULL) {
    return !$decimals ? $this->distance * self::ONE_NAUTICAL_MILE_IN_MILES : round($this->distance * self::ONE_NAUTICAL_MILE_IN_MILES, $decimals);
  }

}
