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

/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['randomnews'] = '{title_legend},name,headline,type;{config_legend},news_archives,randomnews_showtitle,randomnews_showteaser,randomnews_showimage;{image_legend:hide},imgSize;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['randomnews_showteaser'] = [
    'exclude'                 => true
,   'inputType'               => 'checkbox'
,   'eval'                    => ['tl_class'=>'w50 clr']
,   'sql'                     => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_module']['fields']['randomnews_showimage'] = [
    'exclude'                 => true
,   'inputType'               => 'checkbox'
,   'eval'                    => ['tl_class'=>'w50']
,   'sql'                     => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_module']['fields']['randomnews_showtitle'] = [
    'exclude'                 => true
,   'inputType'               => 'checkbox'
,   'eval'                    => ['tl_class'=>'w50']
,   'sql'                     => "char(1) NOT NULL default ''"
];
