<?php

namespace App\Http\Controllers;

use App\Jobs\UploadFileToS3;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoices.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoices.create');
    }

    protected function getFilename($file)
    {
        $filename = 'invoice_' . uniqid() . '.' . $file->getClientOriginalExtension();

        return $filename;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! $request->hasFile('file')) {
            return response()->json([
                'message' => 'File missing',
            ], 422);
        }

        if (! $request->file->isValid()) {
            return response()->json([
                'message' => 'Invalid file provided',
            ], 422);
        }

        // TODO reposition procedure
        $filename = $this->getFilename($request->file);
        $filePath = $request->file->storeAs(
            config('faktura.storage.directory'),
            $filename
        );

        $invoice = Invoice::create([
            'filename' => $filename,
            'original_name' => $request->file->getClientOriginalName(),
            'file_path' => $filePath,
            // 'number' =>  '', cloud count based generation procedure
        ]);

        UploadFileToS3::dispatch($invoice);

        return response()->json([
            'invoice' => $invoice,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
