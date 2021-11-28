<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;

class ORMBiodata extends Eloquent
{
    protected $table = 'biodata';

    protected $primaryKey = 'NIK';

    public $timestamps = false;
}