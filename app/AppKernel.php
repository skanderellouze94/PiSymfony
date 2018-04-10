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
            new AnnonceBundle\AnnonceBundle(),
            new ProductBundle\ProductBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            new ActualitesBundle\ActualitesBundle(),
            new ReclamationBundle\ReclamationBundle(),
            new Nomaya\SocialBundle\NomayaSocialBundle(),
<<<<<<< HEAD
=======
            new ProductBundle\ProductBundle(),
>>>>>>> 7c503dd3d434c1127c5bb360a5c86e67832e5451
            new DemandeBundle\DemandeBundle(),
            new ForumBundle\ForumBundle(),
            new Eko\GoogleTranslateBundle\EkoGoogleTranslateBundle(),
            new Vich\UploaderBundle\VichUploaderBundle(),
            new Knp\Bundle\SnappyBundle\KnpSnappyBundle(),
<<<<<<< HEAD
            new AncaRebeca\FullCalendarBundle\FullCalendarBundle(),

=======
<<<<<<< HEAD

=======
>>>>>>> CRUD produit + service
>>>>>>> d225d185d8c713c94340f79ce6a9d6040316c099
>>>>>>> bdc2440475f198a081bbf4b7e976fa57d78aa023
>>>>>>> f139aee60e6c58f2b36220c9e67bca0120e5914f
>>>>>>> 7c503dd3d434c1127c5bb360a5c86e67832e5451
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
