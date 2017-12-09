<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Workflow\CompraWorkflow;
use App\Workflow\Workflow;
use Illuminate\Http\Request;

class CompraController extends Controller
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
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
    }

    public function foo(Compra $compra)
    {
        $compra = new Compra();
        $compraWorkflow = new CompraWorkflow($compra);

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
