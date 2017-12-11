<?php
/**
 * Created by PhpStorm.
 * User: mateu
 * Date: 09/12/2017
 * Time: 12:55
 */

namespace App\Workflow;

use App\User;

abstract class Workflow
{

    public static $ENDED_STATUS_VALUE = "FINISHED";
    public static $STARTED_STATUS_VALUE = "STARTED";

    /**
     * Cada workflow possui uma entidade que devemos registrar seu estado. Ex.: PurchaseWorkflow temos o compra,
     * EditalWorkflow temos edital
     * @var \Object artifact
     */
    protected $artifact;

    /**
     * Tipos de usuários no qual o artifact pode estar presente.
     * @var array places
     */
    protected $places = [];

    /**
     * Transições que o artifact tem. Exemplo:
     * <code>
     *  "transition_name" => [
     *      "from" => "previous_place",
     *      "to" => "next_place"
     * ]
     * </code>
     * @var array transitions
     */
    protected $transitions = [];

    /**
     * CRUD
     *
     * @var array
     */
    protected $actions = [
        'create',
        'read',
        'update',
        'delete'
    ];

    private function flushTransitions() {
        $temp = [];

        foreach ($this->transitions as $transition => $value) {
            array_push($temp, $transition);
        }

        return $temp;
    }

    protected function getNext($string) {

        $transitions = $this->flushTransitions();

        if($string == null) return $transitions[0];
        if($string == Workflow::$ENDED_STATUS_VALUE) return Workflow::$ENDED_STATUS_VALUE;

        $length = sizeof($transitions);

        for ($i = 0; $i < $length; $i++) {
            if($transitions[$i] == $string) {
                if($i == $length - 1) {
                    return Workflow::$ENDED_STATUS_VALUE;
                }
                return $transitions[$i + 1];
            }
        }

        return $transitions[0];

    }

    protected function getPrevious($string) {

        $transitions = $this->flushTransitions();
        $length = sizeof($transitions);

        if($string == null) return Workflow::$STARTED_STATUS_VALUE;
        if($string == Workflow::$STARTED_STATUS_VALUE) return Workflow::$STARTED_STATUS_VALUE;
        if($string == Workflow::$ENDED_STATUS_VALUE) return $transitions[$length - 1];


        for ($i = -1; $i < $length - 1; $i++) {
            if($transitions[$i + 1] == $string) {
                if($i == -1) {
                    return Workflow::$STARTED_STATUS_VALUE;
                }
                return $transitions[$i];
            }
        }

        return $transitions[0];

    }

    public function previous() {
        $oldStatus = $this->artifact->status;

        $newStatus = $this->getPrevious($oldStatus);

        $this->artifact->setAttribute("status", $newStatus);

        $this->notify($oldStatus, $newStatus, false);

        print $this->artifact->status ."<br>";
    }

    public function next() {

        $oldStatus = $this->artifact->status;

        $newStatus = $this->getNext($oldStatus);

        $this->artifact->setAttribute("status", $newStatus);

        $this->notify($oldStatus, $newStatus, true);

        print $this->artifact->status ."<br>";
    }

    /**
     * Função Handler que é chamada sempre quando ocorre mudança no estado do Workflow.
     *
     * @param $oldStatus
     * @param $newStatus
     * @param bool $isNext
     * @return void
     */
    abstract function notify($oldStatus, $newStatus, $isNext = true);

    /**
     * Função responsável por fazer um filtro por usuário. A função é o ponto de encontro em Workflow$places e
     * Workflow$actions.
     * @return boolean
     */
    abstract function authorize($action);
}