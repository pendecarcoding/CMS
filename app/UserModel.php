<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class UserModel extends Model
{
  protected $table = 'tbl_user';
  public $timestamps = false;
}
