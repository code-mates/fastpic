<?php

/**
 * Require a view.
 *
 * @param  string $name
 * @param  array  $data
 */
function view($name, $data = [])
{
    extract($data);
    return require "app/views/{$name}.view.php";
}
/**
 * Redirect to a new page.
 *
 * @param  string $path
 */
function redirect($path)
{
    header("Location: /{$path}");
}

/**
 * Pretty Print a var_dump
 *
 * @param  any $data
 */
function pp($data)
{
  echo '<pre>'. var_export($data, true) . '</pre>';
}

/**
 * Pluralizes the text if the count is greater than 1
 *
 * @param  number $count
 * @param  string $text
 * @return string
 */
function pluralize( $count, $text )
{
  return $count . ( ( $count == 1 ) ? ( " $text" ) : ( " ${text}s" ) );
}

/**
 * Gives the time difference between a date and now, 34 seconds ago, 5 minutes ago
 *
 * @param  string $date
 * @return string
 */
function ago($date)
{
  $datetime = new DateTime($date);
  $interval = date_create('now')->diff( $datetime );
  $suffix = ( $interval->invert ? ' ago' : '' );
  if ( $v = $interval->y >= 1 ) return pluralize( $interval->y, 'year' ) . $suffix;
  if ( $v = $interval->m >= 1 ) return pluralize( $interval->m, 'month' ) . $suffix;
  if ( $v = $interval->d >= 1 ) return pluralize( $interval->d, 'day' ) . $suffix;
  if ( $v = $interval->h >= 1 ) return pluralize( $interval->h, 'hour' ) . $suffix;
  if ( $v = $interval->i >= 1 ) return pluralize( $interval->i, 'minute' ) . $suffix;
  return pluralize( $interval->s, 'second' ) . $suffix;
}
