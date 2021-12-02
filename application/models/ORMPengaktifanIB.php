<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;

class ORMPengaktifanIB extends Eloquent
{
    protected $table = 'pengaktifan_ib';

    protected $primaryKey = 'ID_PENGAKTIFAN_IB';

    public $timestamps = false;
}