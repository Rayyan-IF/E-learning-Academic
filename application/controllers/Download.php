<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{
    public function file($nama)
    {
        force_download('./assets/app-assets/file/' . $nama, NULL);
    }

    public function excel_pg()
    {
        force_download('./assets/app-assets/file-excel/template.xlsx', NULL);
    }
}
