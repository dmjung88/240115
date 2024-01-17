<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Master extends Model
{
    use HasFactory;
    
    protected $guarded = [ ];
    //protected $primaryKey = 'id';
    //protected $fillable = [ '*' ];
    protected $table = 't_master_ice';
    public $incrementing = false;

    //W : 도매장코드, S : 업소코드, G : 상품코드, F : 수리코드, C :회사코드, E : 사번
    public static  function  wCodeSeq() :string
    {       
        $wCount =DB::table('t_master_wholesale')->count();
        $length = intval(strlen( $wCount + (int)1 )) ;
        switch ($length) {
            case 1: return "000".intval($wCount + 1); break;
            case 2: return "00" .intval($wCount + 1); break;
            case 3: return "0"  .intval($wCount + 1); break;
            default: return  (int)$wCount + 1;
        }
        exit;
    }
    public static  function  sCodeSeq() :string
    {       
        $wCount =DB::table('t_master_store')->count();
        $length = intval(strlen( $wCount + (int)1 )) ;
        switch ($length) {
            case 1: return "000".$wCount + 1; break;
            case 2: return "00" .intval($wCount + 1); break;
            case 3: return "0"  .intval($wCount + 1); break;
            default: return   intval($wCount + 1);
        }
        exit;
    }
    public static  function  gCodeSeq() :string
    {       
        $wCount =DB::table('t_master_goods')->count();
        $length = intval(strlen( $wCount + (int)1 )) ;
        switch ($length) {
            case 1: return "000".intval($wCount + 1); break;
            case 2: return "00" .intval($wCount + 1); break;
            case 3: return "0"  .intval($wCount + 1); break;
            default: return   intval($wCount + 1);
        }
        exit;
    }
    public static  function  fCodeSeq() :string
    {       
        $wCount =DB::table('t_master_fix')->count();
        $length = intval(strlen( $wCount + (int)1 )) ;
        switch ($length) {
            case 1: return "000".intval($wCount + 1); break;
            case 2: return "00" .intval($wCount + 1); break;
            case 3: return "0"  .intval($wCount + 1); break;
            default: return   intval($wCount + 1);
        }
        exit;
    }
    public static  function  cCodeSeq() :string
    {       
        $wCount =DB::table('t_master_ice')->count();
        $length = intval(strlen( $wCount + (int)1 )) ;
        switch ($length) {
            case 1: return "000".intval($wCount + 1); break;
            case 2: return "00" .intval($wCount + 1); break;
            case 3: return "0"  .intval($wCount + 1); break;
            default: return   intval($wCount + 1);
        }
        exit;
    }
    public static  function  eCodeSeq() :string
    {       
        $wCount =DB::table('t_master_emp')->count();
        $length = intval(strlen( $wCount + (int)1 )) ;
        switch ($length) {
            case 1: return "000".intval($wCount + 1); break;
            case 2: return "00" .intval($wCount + 1); break;
            case 3: return "0"  .intval($wCount + 1); break;
            default: return   intval($wCount + 1);
        }
        exit;
    }

}
