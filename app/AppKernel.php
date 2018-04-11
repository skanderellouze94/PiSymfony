<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{

    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new AppBundle\AppBundle(),
            new PidevEsbeBundle\PidevEsbeBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new EtablissementBundle\EtablissementBundle(),
            new FicheBundle\FicheBundle(),
            new RdvBundle\RdvBundle(),
            new Ivory\CKEditorBundle\IvoryCKEditorBundle(),
            new blackknight467\StarRatingBundle\StarRatingBundle(),
            new DonkeyCode\MailBundle\DonkeyCodeMailBundle(),
            new Mgilet\NotificationBundle\MgiletNotificationBundle(),
<<<<<<< HEAD
            new ActualitesBundle\ActualitesBundle(),
            new ReclamationBundle\ReclamationBundle(),
            new AnnonceBundle\AnnonceBundle(),
            new Nomaya\SocialBundle\NomayaSocialBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            new ProductBundle\ProductBundle(),
=======
            new AnnonceBundle\AnnonceBundle(),
            new ProductBundle\ProductBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            new ActualitesBundle\ActualitesBundle(),
            new ReclamationBundle\ReclamationBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Nomaya\SocialBundle\NomayaSocialBundle(),
>>>>>>> 9f77a506f8f8fc2ae5306b215fb892a091701742
            new DemandeBundle\DemandeBundle(),
            new ForumBundle\ForumBundle(),
            new Eko\GoogleTranslateBundle\EkoGoogleTranslateBundle(),
            new Vich\UploaderBundle\VichUploaderBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Knp\Bundle\SnappyBundle\KnpSnappyBundle(),
<<<<<<< HEAD
=======
            new AncaRebeca\FullCalendarBundle\FullCalendarBundle(),
>>>>>>> 9f77a506f8f8fc2ae5306b215fb892a091701742
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();

            if ('dev' === $this->getEnvironment()) {
                $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
                $bundles[] = new Symfony\Bundle\WebServerBundle\WebServerBundle();
            }
        }

        return $bundles;
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
