<?php

namespace Drupal\breakpoint\Hook;

use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Hook\Attribute\Hook;

/**
 * Hook implementations for breakpoint.
 */
class BreakpointHooks {

  /**
   * Implements hook_help().
   */
  #[Hook('help')]
  public function help($route_name, RouteMatchInterface $route_match) {
    switch ($route_name) {
      case 'help.page.breakpoint':
        $output = '';
        $output .= '<h2>' . t('About') . '</h2>';
        $output .= '<p>' . t('The Breakpoint module keeps track of the height, width, and resolution breakpoints where a responsive design needs to change in order to respond to different devices being used to view the site. This module does not have a user interface. For more information, see the <a href=":docs">online documentation for the Breakpoint module</a>.', [':docs' => 'https://www.drupal.org/documentation/modules/breakpoint']) . '</p>';
        $output .= '<h4>' . t('Terminology') . '</h4>';
        $output .= '<dl>';
        $output .= '<dt>' . t('Breakpoint') . '</dt>';
        $output .= '<dd>' . t('A breakpoint separates the height or width of viewports (screens, printers, and other media output types) into steps. For instance, a width breakpoint of 40em creates two steps: one for widths up to 40em and one for widths above 40em. Breakpoints can be used to define when layouts should shift from one form to another, when images should be resized, and other changes that need to respond to changes in viewport height or width.') . '</dd>';
        $output .= '<dt>' . t('Media query') . '</dt>';
        $output .= '<dd>' . t('<a href=":w3">Media  queries</a> are a formal way to encode breakpoints. For instance, a width breakpoint at 40em would be written as the media query "(min-width: 40em)". Breakpoints are really just media queries with some additional meta-data, such as a name and multiplier information.', [':w3' => 'https://www.w3.org/TR/css3-mediaqueries/']) . '</dd>';
        $output .= '<dt>' . t('Resolution multiplier') . '</dt>';
        $output .= '<dd>' . t('Resolution multipliers are a measure of the viewport\'s device resolution, defined to be the ratio between the physical pixel size of the active device and the <a href="http://en.wikipedia.org/wiki/Device_independent_pixel">device-independent pixel</a> size. The Breakpoint module defines multipliers of 1, 1.5, and 2; when defining breakpoints, modules and themes can define which multipliers apply to each breakpoint.') . '</dd>';
        $output .= '<dt>' . t('Breakpoint group') . '</dt>';
        $output .= '<dd>' . t('Breakpoints can be organized into groups. Modules and themes should use groups to separate out breakpoints that are meant to be used for different purposes, such as breakpoints for layouts or breakpoints for image sizing.') . '</dd>';
        $output .= '</dl>';
        $output .= '<h2>' . t('Uses') . '</h2>';
        $output .= '<dl>';
        $output .= '<dt>' . t('Defining breakpoints and breakpoint groups') . '</dt>';
        $output .= '<dd>' . t('Modules and themes can use the API provided by the Breakpoint module to define breakpoints and breakpoint groups, and to assign resolution multipliers to breakpoints.') . '</dd>';
        $output .= '</dl>';
        return $output;
    }
  }

  /**
   * Implements hook_themes_installed().
   */
  #[Hook('themes_installed')]
  public function themesInstalled($theme_list) {
    \Drupal::service('breakpoint.manager')->clearCachedDefinitions();
  }

  /**
   * Implements hook_themes_uninstalled().
   */
  #[Hook('themes_uninstalled')]
  public function themesUninstalled($theme_list) {
    \Drupal::service('breakpoint.manager')->clearCachedDefinitions();
  }

}
