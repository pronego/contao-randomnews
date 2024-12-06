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
namespace pronego\RandomnewsBundle\Controller\FrontendModule;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\Image\Studio\Studio;
use Contao\CoreBundle\ServiceAnnotation\FrontendModule;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\ModuleModel;
use Contao\NewsModel;
use Contao\StringUtil;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * @FrontendModule("randomnews",
 *   category="miscellaneous",
 *   template="mod_randomnews",
 * )
 */
class RandomnewsController extends AbstractFrontendModuleController {


    /**
     * @var Contao\CoreBundle\Image\Studio\Studio;
     */
    private $studio;


    public function __construct( Studio $studio ) {

        $this->studio = $studio;
    }

    protected function getResponse(FragmentTemplate $template, ModuleModel $model, Request $request): Response {

        $newsArchives = StringUtil::deserialize($model->news_archives, true);

        $objNews = NewsModel::findPublishedByPids($newsArchives, null, 1, 0, ['order'=>'RAND()']);

        if( !$objNews ) {
            return new Response('');
        }

        $objNews = $objNews->current();

        if( $objNews->addImage && !empty($model->randomnews_showimage) ) {

            $imgSize = $objNews->size ?: null;

            // Override the default image size
            if( $model->imgSize ) {
                $size = StringUtil::deserialize($model->imgSize);

                if( $size[0] > 0 || $size[1] > 0 || is_numeric($size[2]) || ($size[2][0] ?? null) === '_' ) {
                    $imgSize = $model->imgSize;
                }
            }

            $figure = $this->studio
                ->createFigureBuilder()
                ->from($objNews->singleSRC)
                ->setSize($imgSize)
                ->setOverwriteMetadata($objNews->getOverwriteMetadata())
                ->enableLightbox($objNews->fullsize)
                ->setLinkHref('{{news_url::'.$objNews->id.'}}')
                ->buildIfResourceExists();

            $figure?->applyLegacyTemplateData($template, null, $objNews->floating);
        }

        $template->title = ($model->randomnews_showtitle == 1) ? '{{news_open::'.$objNews->id.'}}'.$objNews->headline.'{{link_close}}' : '';
        $template->teaser = ($model->randomnews_showteaser == 1) ? $objNews->teaser : '';

        return $template->getResponse();
    }
}
