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
namespace pronego\RandomnewsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;


class RandomnewsBundle extends Bundle {

    public function getPath(): string {

        return \dirname(__DIR__);
    }
}