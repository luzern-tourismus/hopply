<?phprequire __DIR__ . "/config.php";(new \Nemundo\App\ModelDesigner\ModelDesignerConfig())    ->addProject(new \LuzernTourismus\Hopply\HopplyProject());\Nemundo\App\ClassDesigner\ClassDesignerConfig::$classBuilderFormList[] = new \Nemundo\Content\ClassDesigner\ContentTypeClassBuilderForm();//\Nemundo\Admin\Controller\AdminController::addAdminSite(new \Nemundo\App\Application\Site\PublicSite());//new \Nemundo\Admin\Controller\AdminController()