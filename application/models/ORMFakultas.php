<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;

class ORMFakultas extends Eloquent
{
    protected $table = 'fakultas';

    protected $primaryKey = 'ID_FAKULTAS';

    public $timestamps = false;
}