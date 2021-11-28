<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;

class ORMTugasBelajar extends Eloquent
{
    protected $table = 'tugas_belajar';

    protected $primaryKey = 'ID_TUBEL';

    public $timestamps = false;
}