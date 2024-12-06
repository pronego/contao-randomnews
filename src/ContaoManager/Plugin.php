<?php
/**
 * Random news for Contao Open Source CMS.
 *
 * @author    Heiko Unger <odenwerk@gmail.com>
 * @author    Dr. Manuel Lamotte-Schubert <mls@pronego.com>
 * @license   LGPL-3.0-or-later
 * @copyright 2013, Heiko Unger
 * @copyright 2024, PRONEGO - https://www.pronego.com
 */
namespace pronego\RandomnewsBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\NewsBundle\ContaoNewsBundle;
use pronego\RandomnewsBundle\RandomnewsBundle;


class Plugin implements BundlePluginInterface {

    /**
     * {@inheritdoc}
     */
    public function getBundles( ParserInterface $parser ): array {

        return [
            BundleConfig::create(RandomnewsBundle::class)
                ->setLoadAfter([
                    ContaoCoreBundle::class
                ,   ContaoNewsBundle::class
                ])
        ];
    }
}
