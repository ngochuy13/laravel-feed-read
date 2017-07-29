<?php

namespace App\Http\Controllers;

use App\Services\ImportService;


class ImportController extends Controller
{
    protected $globalImportService;
    public function __construct(ImportService $ImportService)
    {
        $this->globalImportService = $ImportService;
    }

    /**
     * Display a listing of the Customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $map_url = 'http://www.feedforall.com/sample.xml';
        $response_xml_data = file_get_contents($map_url);
        if($response_xml_data){
            echo "read";
        }
        $data = simplexml_load_string($response_xml_data);
        echo "<pre>";

        for ($i=0; $i < count($data->channel->item) ; $i++) {
            $blog = (array) $data->channel->item[$i];
            $this->globalImportService->createBlog($blog);
        }
        exit;
    }

}
