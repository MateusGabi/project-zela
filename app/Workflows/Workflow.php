<?php
/**
 * Created by PhpStorm.
 * User: mateu
 * Date: 09/12/2017
 * Time: 12:55
 */

namespace App\Workflow;


class Workflow
{

    private static $ENDED_STATUS_VALUE = "FINISHED";
    private static $STARTED_STATUS_VALUE = "STARTED";

    /**
     * Cada workflow possui uma entidade que devemos registrar seu estado. Ex.: CompraWorkflow temos o compra,
     * EditalWorkflow temos edital
     * @var \Object artifact
     */
    protected $artifact;

    /**
     * Tipos de usuários no qual o artifact pode estar presente
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

    private function flushTransitions() {
        $temp = [];

        foreach ($this->transitions as $transition => $value) {
            array_push($temp, $transition);
        }

        return $temp;
    }

    function previous() {
        $oldStatus = $this->artifact->status;

        $new_status = $this->getPrevious($oldStatus);

        $this->artifact->setAttribute("status", $new_status);

        print $this->artifact->status ."<br>";
    }

    function next() {

        $oldStatus = $this->artifact->status;

        $new_status = $this->getNext($oldStatus);

        $this->artifact->setAttribute("status", $new_status);

        print $this->artifact->status ."<br>";
    }
}