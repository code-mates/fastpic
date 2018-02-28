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
 * @param  any $data
 */
function pp($data) {
  echo '<pre>'. var_export($data, true) . '</pre>';
}
