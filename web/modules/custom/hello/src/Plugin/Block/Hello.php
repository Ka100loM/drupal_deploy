<?php

namespace Drupal\hello\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides  a hello block.
 * 
 * @Block(
 *  id = "hello_block",
 *  admin_label = @Translation("Hello!")
 * )
 */
class Hello extends BlockBase
{
    /**
     * Implements Drupal|Core|Block|BlockBase::build().
     */
    public function build() {   
        $time = \Drupal::service('date.formatter')->format(\Drupal::service('datetime.time')->getCurrentTime(), 'custom', 'H:i s\s');
        $name = \Drupal::currentUser()->isAuthenticated() ? \Drupal::currentUser()->getAccountName() : $this->t('anonymous');
        $build = [
            '#markup' => $this->t('Welcome %name. It is %time.', [
              '%name' => $name,
              '%time' => $time,
            ]),
            '#cache' => [
                'keys' => ['hello:block'],
                'contexts' => ['user'],
                'max-age' => '10',
            ],
          ];


        return $build;
    }
}
