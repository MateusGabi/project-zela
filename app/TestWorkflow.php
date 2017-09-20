<?php
/**
 * Created by PhpStorm.
 * User: Mateus Gabi Moreira
 * Date: 20/09/2017
 * Time: 10:50
 */

namespace App;

use ezcWorkflow;

class TestWorkflow
{

    protected $workflow;

    protected function __construct() {

        $this->workflow = new ezcWorkflow();

        // recebemos um workflow
        $idDoWorkflowGerado = $this->workflow->__get('id');

    }

}