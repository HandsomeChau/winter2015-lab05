<?php

/**
 * Display one or all of the quotes on file.
 *
 * controllers/Viewer.php
 *
 * ------------------------------------------------------------------------
 */
class Viewer extends Application
{

    function __construct()
    {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index()
    {
        $this->data['pagebody'] = 'homepage';    // this is the view we want shown
        $this->data['authors'] = $this->quotes->all();
        $this->render();
    }

    // method to display just a single quote
    function quote( $id )
    {
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        $this->data = array_merge( $this->data, (array)$this->quotes->get( $id ) );
        $this->render();
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */