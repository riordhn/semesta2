<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;

class ORMIzinBelajar extends Eloquent
{
    protected $table = 'izin_belajar';

    protected $primaryKey = 'ID_IB';

    public $timestamps = false;
}