<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Census extends Model
{
    protected $table="tblCensus";
    protected $primaryKey = 'RunID';
    protected $fillable = [
        'RunID','AutoID','UniqueId','EntryStatus','SWVer','NSlNo','Tab_ID','Date',
        'Centre', 'CentCode','SlLang','STime','ETime','LOI','IntName','IntCode','FSName','FSCode','District','Zone','BNo','Region','TV','G_Location','P1_Lon_1','P1_Lat_1',
        'P1_1_Name','P1_2_a','P1_2_b','P1_2_c','P1_2_d','P1_2_e','P1_2_f','P1_3','P1_3_Oth','P1_4','P1_4_Oth','P1_4a','P1_5',
        'P1_5_Oth','P1_5a','P1_6','P1_6_Oth','P1_6a','P2_0','Q1_RName','Q1_Mob','Q1_Landno','Q1_Role','Q1_OName','Q1_OAddress','Q1_OLoc','Q1_OTV','Q1_OPinCode','Q1_OPhno',
        'Q2','Q2a','Q3','Q4','Q4_Oth','Q4a','Q4b','Q4c_01','Q4c_02','Q4c_03','Q4c_04','Q4c_05','Q4c_06','Q4c_07','Q4c_08','Q5','Q6a',
        'Q6b_01','Q6b_02','Q6b_03','Q6b_04','Q6b_05','Q6b_06','Q6b_07','Q6b_08','Q6b_09','Q6c','Q6c_Oth','Q7a','Q7a_Oth','Q7b','Q8','Q9','Q9a_SName','Q9a_Street','Q9a_Loc','Q9a_Area','Q9a_City','Q9a_Pincode','Q9a_Land','Q10','Q11','Q11_Lat',
        'Q11_Lon','Q12','WeekNo','Device','DeviceID','ResId','TLcode','TLCbox','EICCode','OFECode','FMCode','IntType','SEGtype','GeoLatitude','GeoLongitude','Timestamp','Position',
        'IsUpdated','AIsUpdated','Sync_Date',"updated_at","edited_flag"
    ]; 

    public function scopeStatus($query)
    {
        $user = Auth::user();
        if($user->level == 1 || $user->level == 2)
            return $query->where("EntryStatus", "F")->where("edited_flag",null);
    }

    public static function getQueriedResult()
    {
        return static::status()->get();
    }
}
