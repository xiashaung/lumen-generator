<?php

namespace Xiashaung\LumenGenerator;

use Doctrine\DBAL\Schema\Table;
use Illuminate\Database\DatabaseManager;
use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Xiashaung\LumenGenerator\Model\HasOne;
use Xiashaung\LumenGenerator\Model\HasMany;
use Xiashaung\LumenGenerator\Model\BelongsTo;
use Xiashaung\LumenGenerator\Model\MethodModel;
use Xiashaung\LumenGenerator\Model\ArgumentModel;
use Xiashaung\LumenGenerator\Model\BelongsToMany;
use Xiashaung\LumenGenerator\Model\DocBlockModel;
use Xiashaung\LumenGenerator\Model\PropertyModel;
use Xiashaung\LumenGenerator\Model\NamespaceModel;
use Xiashaung\LumenGenerator\Model\ControllerModel;
use Xiashaung\LumenGenerator\Model\VirtualPropertyModel;
use Xiashaung\LumenGenerator\Exception\GeneratorException;
use Xiashaung\LumenGenerator\Model\UseClassModel;

class ControllerBuilder
{
    /**
     * @var AbstractSchemaManager
     */
    protected $manager;

    /**
     * Builder constructor.
     * @param DatabaseManager $databaseManager
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        try {
            $this->manager = $databaseManager->connection()->getDoctrineSchemaManager();
        } catch (\Exception $e) {   // connection error
            echo $e->getMessage();
            return;
        }
        $dp = $this->manager->getDatabasePlatform();
        $dp->registerDoctrineTypeMapping('enum', 'array');
        $dp->registerDoctrineTypeMapping('set', 'array');
    }

    public function getTableList()
    {
        return $this->manager->listTables();
    }

    /**
     * @param Config $config
     * @return ControllerModel
     * @throws GeneratorException
     */
    public function createController(Config $config)
    {
        $ctrl = new ControllerModel(
            $config->get('class_name'),
            $config->get('base_class_lumen_ctrl_name'),
            $config->get('table_name')
        );

        if (!$this->manager->tablesExist($ctrl->getTableName())) {
            throw new GeneratorException(sprintf('Table %s does not exist', $ctrl->getTableName()));
        }

        $this->setNamespace($ctrl, $config)
            ->setCustomProperties($ctrl, $config)
            ->setFields($ctrl)
            ->setRelations($ctrl);

        $ctrl->addSwaggerBlock();

        return $ctrl;
    }

    /**
     * @param Config $config
     * @return ControllerModel
     * @throws GeneratorException
     */
    public function createBulkController()
    {
        $ctrl = new ControllerModel(
            'Bulk',
            null,
            null
        );

        $ctrl->setNamespace(new NamespaceModel('App\Http\Controllers'));

        $ctrl->addUses(new UseClassModel('Illuminate\Http\Request'));
        $ctrl->addUses(new UseClassModel('Illuminate\Support\Facades\DB'));

        $method = new MethodModel('bulk');
        $method->addArgument(new ArgumentModel('request', 'Request'));

        $methodBody = '$response = array();'. PHP_EOL;
        $methodBody .= '        foreach($request->all() as $call){'. PHP_EOL;
        $methodBody .= '            if($call[\'type\'] === \'GET\' || $call[\'type\'] === \'DELETE\'){'. PHP_EOL;
        $methodBody .= '                $req = Request::create($call[\'path\'], $call[\'type\']);'. PHP_EOL;
        $methodBody .= '            } else {'. PHP_EOL;
        $methodBody .= '                $req = Request::create($call[\'path\'], $call[\'type\'], $call[\'data\']);'. PHP_EOL;
        $methodBody .= '            }'. PHP_EOL;
        $methodBody .= '            $res = app()->handle($req);'. PHP_EOL;
        $methodBody .= '            $response[] = json_decode($res->getContent());'. PHP_EOL;
        $methodBody .= '        }'. PHP_EOL;
        $methodBody .= ''. PHP_EOL;
        $methodBody .= '        return $response;'. PHP_EOL;


        $method->setBody($methodBody);
        $method->setDocBlock(new DocBlockModel('{@inheritdoc}'));

        $ctrl->addMethod($method);

        return $ctrl;
    }

    /**
     * @param ControllerModel $ctrl
     * @param Config $config
     * @return $this
     */
    protected function setNamespace(ControllerModel $ctrl, Config $config)
    {
        $namespace = $config->get('lumen_ctrl_namespace');
        $ctrl->setNamespace(new NamespaceModel($namespace));

        return $this;
    }

    /**
     * @param ControllerModel $ctrl
     * @param Config $config
     * @return $this
     */
    protected function setCustomProperties(ControllerModel $ctrl, Config $config)
    {
        return $this;
    }

    /**
     * @param ControllerModel $ctrl
     * @return $this
     */
    protected function setFields(ControllerModel $ctrl)
    {

        return $this;
    }

    /**
     * @param ControllerModel $ctrl
     * @return $this
     */
    protected function setRelations(ControllerModel $ctrl)
    {

        return $this;
    }
}
