<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Workflow\PurchaseWorkflow;
use App\Workflow\Workflow;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $compra)
    {
        //
    }

    public function foo(Purchase $compra)
    {
        $compra = new Purchase();
        $compraWorkflow = new PurchaseWorkflow($compra);

        if ($compraWorkflow->authorize("create")) {
            $compraWorkflow->next();
            $compraWorkflow->next();
            $compraWorkflow->next();
            $compraWorkflow->next();
            $compraWorkflow->next();
            $compraWorkflow->next();

            // go back

            $compraWorkflow->previous();
            $compraWorkflow->previous();
            $compraWorkflow->previous();
            $compraWorkflow->previous();
            $compraWorkflow->previous();
            $compraWorkflow->previous();
        }
        else {
            print "Você não possui autorização para essa ação.";
        }
    }
}
