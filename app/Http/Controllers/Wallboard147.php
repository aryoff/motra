<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Wallboard147 extends Controller
{
    public function get_wallboard_data()
    {
        $total_skill_cms = array();
        foreach ($this->total_skill_cms() as $value) {
            $temp = array();
            $temp['acdcalls'] = $value->acdcalls;
            $temp['abncalls'] = $value->abncalls;
            $total_skill_cms[$value->split] = $temp;
        }
        $detail_sephia = $this->detail_sephia();
        $detail_sephia_mtd_sisa = $this->detail_sephia_mtd_sisa();
        $response['singleNum'] = array(
            'totalKomplain' => $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls'],
            'komplainIna' => $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'],
            'komplainEng' => $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls'],
            'komplainAcd' => $total_skill_cms[2]['acdcalls'] + $total_skill_cms[5]['acdcalls'],
            'komplainAcdIna' => $total_skill_cms[2]['acdcalls'],
            'komplainAcdEng' => $total_skill_cms[5]['acdcalls'],
            'komplainAbn' => $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['abncalls'],
            'komplainAbnIna' => $total_skill_cms[2]['abncalls'],
            'komplainAbnEng' => $total_skill_cms[5]['abncalls'],
            'totalRegInfo' => $total_skill_cms[53]['acdcalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['acdcalls'] + $total_skill_cms[54]['abncalls'],
            'regInfoAcd' => $total_skill_cms[53]['acdcalls'] + $total_skill_cms[53]['acdcalls'],
            'regInfoAbn' => $total_skill_cms[54]['abncalls'] + $total_skill_cms[54]['abncalls'],
            'totAll' => $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls'] + $total_skill_cms[53]['acdcalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['acdcalls'] + $total_skill_cms[54]['abncalls'],
            'totAllAcd' => $total_skill_cms[2]['acdcalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[53]['acdcalls'] + $total_skill_cms[54]['acdcalls'],
            'totAllAbn' => $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['abncalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['abncalls'],
            'sephiaCDUnconfirmed' => $detail_sephia->bk,
            'sephiaCDWA' => $detail_sephia->wa,
            'sephiaCDSMS' => $detail_sephia->sms,
            'sephiaCDRNA' => $detail_sephia->rna,
            'sephiaCDEskalasiLangsung' => $detail_sephia->eskalasi_langsung,
            'sephiaCDContacted' => $detail_sephia->contacted,
            'sephiaCDJunk' => $detail_sephia->junk,
            'sephiaCDSisaOrder' => $detail_sephia->onprogress + $detail_sephia->unconsumed,
            'sephiaCDRecall' => $detail_sephia->connected_to_t1,
            'sephiaCD' => $detail_sephia->onprogress + $detail_sephia->unconsumed + $detail_sephia->connected_to_t1 + $detail_sephia->contacted + $detail_sephia->rna + $detail_sephia->junk,
            'sephiaMTDUnconfirmed' => $detail_sephia_mtd_sisa->bk,
            'sephiaMTDWA' => $detail_sephia_mtd_sisa->wa,
            'sephiaMTDSMS' => $detail_sephia_mtd_sisa->sms,
            'sephiaMTDRNA' => $detail_sephia_mtd_sisa->rna,
            'sephiaMTDEskalasiLangsung' => $detail_sephia_mtd_sisa->eskalasi_langsung,
            'sephiaMTDContacted' => $detail_sephia_mtd_sisa->contacted,
            'sephiaMTDJunk' => $detail_sephia_mtd_sisa->junk,
            'sephiaMTDSisaOrder' => $detail_sephia_mtd_sisa->onprogress + $detail_sephia_mtd_sisa->unconsumed,
            'sephiaMTDRecall' => $detail_sephia_mtd_sisa->connected_to_t1,
            'sephiaMTD' => $detail_sephia_mtd_sisa->onprogress + $detail_sephia_mtd_sisa->unconsumed + $detail_sephia_mtd_sisa->connected_to_t1 + $detail_sephia_mtd_sisa->contacted + $detail_sephia_mtd_sisa->rna + $detail_sephia_mtd_sisa->junk
        );
        $response['avgTimeToPickup'] = $this->avg_time_to_pickup()->average;
        $response['dailyInterval'] = $this->daily_interval();

        return response()->json($response, 200);
    }

    function total_skill_cms()
    {
        return DB::connection('cms_mysql')->select('SELECT split,SUM(acdcalls) acdcalls,SUM(abncalls) abncalls FROM (SELECT split,SUM(acdcalls) acdcalls,SUM(abncalls) abncalls FROM hsplit WHERE row_date=CURRENT_DATE AND split IN (1,2,3,4,5,6,53,54) GROUP BY split UNION ALL SELECT split,acdcalls,abncalls FROM csplit WHERE split IN (1,2,3,4,5,6,53,54)) csplit GROUP BY split');
    }

    function avg_time_to_pickup()
    {
        return DB::connection('sephia_pgsql')->select("SELECT concat (CASE WHEN ((COALESCE (AVG,0) :: INTEGER/60)/60)< 10 THEN '0' ELSE '' END,((COALESCE (AVG,0) :: INTEGER/60)/60),':',CASE WHEN ((COALESCE (AVG,0) :: INTEGER/60) % 60)< 10 THEN '0' ELSE '' END,((COALESCE (AVG,0) :: INTEGER/60) % 60),':',CASE WHEN (COALESCE (AVG,0) :: INTEGER % 60)< 10 THEN '0' ELSE '' END,(COALESCE (AVG,0) :: INTEGER % 60)) AS average FROM (SELECT FLOOR (AVG (((DATE_PART('day',datetime_callback-to_timestamp((dynamic_ticket_data.DATA->> 'datetime') :: FLOAT) :: TIMESTAMP)*24+DATE_PART ('hour',datetime_callback-to_timestamp((dynamic_ticket_data.DATA->> 'datetime') :: FLOAT) :: TIMESTAMP))*60+DATE_PART ('minute',datetime_callback-to_timestamp((dynamic_ticket_data.DATA->> 'datetime') :: FLOAT) :: TIMESTAMP))*60+DATE_PART ('second',datetime_callback-to_timestamp((dynamic_ticket_data.DATA->> 'datetime') :: FLOAT) :: TIMESTAMP))) AS AVG FROM (SELECT no_tiket,MIN (datetime_callback) AS datetime_callback FROM callback_manja WHERE date_callback=CURRENT_DATE AND \"order\"=2 GROUP BY no_tiket) callback_manja INNER JOIN dynamic_ticket_data ON callback_manja.no_tiket=dynamic_ticket_data.unique_key->> 'serial_increment' AND DATA->> 'source'='ivr_gamas' AND (DATA->> 'datetime') :: FLOAT> EXTRACT (EPOCH FROM to_timestamp(concat (CURRENT_DATE,' 08:00:00'),'YYYY-MM-DD HH:MI:SS'))) TEMP")[0];
    }

    function detail_ivr()
    {
        return DB::connection('sephia_pgsql')->select("SELECT SUM(CASE WHEN (data->>'j_gangguan' <> '' AND data->>'no_fastel1' <> '') THEN 1 ELSE 0 END) AS ina_input_callback,SUM(CASE WHEN NOT (data->>'j_gangguan' <> '' AND data->>'no_fastel1' <> '') THEN 1 ELSE 0 END) AS ina_tidak_input_callback FROM dynamic_ticket_data WHERE (data->>'date')::DATE = CURRENT_DATE AND data->>'source' = 'ivr_gamas'");
    }

    function detail_sephia()
    {
        return DB::connection('sephia_pgsql')->select("SELECT*FROM (SELECT SUM (CASE WHEN status=0 THEN 1 ELSE 0 END) AS unconsumed,SUM (CASE WHEN status=1 THEN 1 ELSE 0 END) AS contacted,SUM (CASE WHEN status=2 THEN 1 ELSE 0 END) AS RNA,SUM (CASE WHEN status=3 THEN 1 ELSE 0 END) AS junk,SUM (CASE WHEN status=98 THEN 1 ELSE 0 END) AS onprogress,SUM (CASE WHEN status=99 THEN 1 ELSE 0 END) AS connected_to_t1 FROM dynamic_ticket_data WHERE (DATA->> 'date') :: DATE=CURRENT_DATE AND DATA->> 'source'='ivr_gamas') dyn_data,(SELECT COALESCE (SUM (CASE WHEN kat=32 THEN 1 ELSE 0 END),0) AS eskalasi_langsung,COALESCE (SUM (CASE WHEN subkat1=84 OR subkat2=43 OR subkat1=138 THEN 1 ELSE 0 END),0) AS fcr,COALESCE (SUM (CASE WHEN subkat1=85 OR subkat1=139 OR subkat2=44 THEN 1 ELSE 0 END),0) AS tiketing FROM (SELECT callback_interaksi_log.*FROM callback_interaksi_log INNER JOIN (SELECT unique_key->> 'serial_increment' AS serial_increment FROM dynamic_ticket_data WHERE (DATA->> 'date') :: DATE=CURRENT_DATE AND DATA->> 'source'='ivr_gamas') dynamic_ticket_data ON callback_interaksi_log.id_order=dynamic_ticket_data.serial_increment) callback_interaksi_log WHERE \"order\"=2 AND segstart :: DATE=CURRENT_DATE) log,(SELECT COALESCE(SUM (CASE WHEN additional_data-> 'sms'->> 'status'='SENT' THEN 1 ELSE 0 END),0) AS sms,COALESCE(SUM (CASE WHEN additional_data-> 'wa'->> 'status'='SENT' THEN 1 ELSE 0 END),0) AS wa,COALESCE(SUM (CASE WHEN status='NOT CONTACTED' AND COALESCE (additional_data-> 'sms'->> 'status','')<> 'SENT' AND COALESCE (additional_data-> 'wa'->> 'status','')<> 'SENT' THEN 1 ELSE 0 END),0) AS bk FROM (SELECT callback_manja.*FROM callback_manja INNER JOIN (SELECT unique_key->> 'serial_increment' AS serial_increment FROM dynamic_ticket_data WHERE (DATA->> 'date') :: DATE=CURRENT_DATE AND DATA->> 'source'='ivr_gamas') dynamic_ticket_data ON callback_manja.no_tiket=dynamic_ticket_data.serial_increment WHERE \"order\"=2 AND date_callback=CURRENT_DATE) callback_manja) manja")[0];
    }

    function detail_sephia_mtd_sisa()
    {
        return DB::connection('sephia_pgsql')->select("SELECT*FROM (SELECT SUM (CASE WHEN status=0 THEN 1 ELSE 0 END) AS unconsumed,SUM (CASE WHEN status=1 THEN 1 ELSE 0 END) AS contacted,SUM (CASE WHEN status=2 THEN 1 ELSE 0 END) AS RNA,SUM (CASE WHEN status=3 THEN 1 ELSE 0 END) AS junk,SUM (CASE WHEN status=98 THEN 1 ELSE 0 END) AS onprogress,SUM (CASE WHEN status=99 THEN 1 ELSE 0 END) AS connected_to_t1 FROM dynamic_ticket_data WHERE (DATA->> 'date') :: DATE BETWEEN DATE_TRUNC('MONTH',CURRENT_DATE) :: DATE AND CURRENT_DATE-INTERVAL '1 DAY' AND DATA->> 'source'='ivr_gamas') dyn_data,(SELECT COALESCE (SUM (CASE WHEN kat=32 THEN 1 ELSE 0 END),0) AS eskalasi_langsung,COALESCE (SUM (CASE WHEN subkat1=84 OR subkat2=43 OR subkat1=138 THEN 1 ELSE 0 END),0) AS fcr,COALESCE (SUM (CASE WHEN subkat1=85 OR subkat1=139 OR subkat2=44 THEN 1 ELSE 0 END),0) AS tiketing FROM (SELECT callback_interaksi_log.*FROM callback_interaksi_log INNER JOIN (SELECT unique_key->> 'serial_increment' AS serial_increment FROM dynamic_ticket_data WHERE (DATA->> 'date') :: DATE BETWEEN DATE_TRUNC('MONTH',CURRENT_DATE) :: DATE AND CURRENT_DATE-INTERVAL '1 DAY' AND DATA->> 'source'='ivr_gamas') dynamic_ticket_data ON callback_interaksi_log.id_order=dynamic_ticket_data.serial_increment) callback_interaksi_log WHERE \"order\"=2 AND segstart :: DATE BETWEEN DATE_TRUNC('MONTH',CURRENT_DATE) :: DATE AND CURRENT_DATE-INTERVAL '1 DAY') log,(SELECT COALESCE(SUM (CASE WHEN additional_data-> 'sms'->> 'status'='SENT' THEN 1 ELSE 0 END),0) AS sms,COALESCE(SUM (CASE WHEN additional_data-> 'wa'->> 'status'='SENT' THEN 1 ELSE 0 END),0) AS wa,COALESCE(SUM (CASE WHEN status='NOT CONTACTED' AND COALESCE (additional_data-> 'sms'->> 'status','')<> 'SENT' AND COALESCE (additional_data-> 'wa'->> 'status','')<> 'SENT' THEN 1 ELSE 0 END),0) AS bk FROM (SELECT callback_manja.*FROM callback_manja INNER JOIN (SELECT unique_key->> 'serial_increment' AS serial_increment FROM dynamic_ticket_data WHERE (DATA->> 'date') :: DATE BETWEEN DATE_TRUNC('MONTH',CURRENT_DATE) :: DATE AND CURRENT_DATE-INTERVAL '1 DAY' AND DATA->> 'source'='ivr_gamas') dynamic_ticket_data ON callback_manja.no_tiket=dynamic_ticket_data.serial_increment WHERE \"order\"=2 AND date_callback BETWEEN DATE_TRUNC('MONTH',CURRENT_DATE) :: DATE AND CURRENT_DATE-INTERVAL '1 DAY') callback_manja) manja")[0];
    }

    function daily_interval()
    {
        $result2 = DB::connection('cms_mysql')->select("SELECT*FROM (SELECT INSERT (CASE WHEN starttime='0' THEN '0000' WHEN starttime='15' THEN '0015' WHEN starttime='30' THEN '0030' WHEN starttime='45' THEN '0045' WHEN length(starttime)=3 THEN CONCAT('0',starttime) ELSE starttime END,3,0,':') AS starttime,maxstaffed AS staffed,callsoffered,acdcalls+abncalls AS skill FROM (SELECT hsplit.row_date,hsplit.starttime,hsplit.maxstaffed,hsplit.acdcalls,hsplit.abncalls,hsplit.callsoffered FROM (SELECT*FROM hsplit WHERE split=2 AND acd=1) hsplit WHERE hsplit.row_date=CURRENT_DATE) hsplit UNION ALL SELECT CONCAT(CASE WHEN EXTRACT(HOUR FROM CURRENT_TIME)< 10 THEN '0' ELSE '' END,EXTRACT(HOUR FROM CURRENT_TIME),':',CASE WHEN EXTRACT(MINUTE FROM CURRENT_TIME)< 15 THEN '00' WHEN EXTRACT(MINUTE FROM CURRENT_TIME)< 30 THEN '15' WHEN EXTRACT(MINUTE FROM CURRENT_TIME)< 45 THEN '30' ELSE '45' END),staffed,callsoffered,acdcalls+abncalls AS skill FROM csplit WHERE acd=1 AND split=2) tmp ORDER BY starttime");
        if (!$result2) {
            return false;
        } else {
            $labels = array();
            $data1 = array();
            $data2 = array();
            // $data3 = array();
            $data4 = array();
            foreach ($result2 as $value) {
                $temp_labels = array();
                $temp_labels[] = $value->starttime;
                // $temp_labels[] = $value->staffed;
                $labels[] = $temp_labels;
                $data1[] = (int) $value->callsoffered;
                $data2[] = (int) $value->skill;
                if ((int) $value->callsoffered == 0) {
                    $data4[] = 0;
                } else {
                    $data4[] = round(((int) $value->skill / (int) $value->callsoffered) * 100, 0);
                }
            }
            $datasets = array();
            $datas['type'] = 'line';
            $datas['data'] = $data1;
            $datas['yAxisID'] = 'A';
            $datas['backgroundColor'] = 'transparent';
            $datas['borderColor'] = '#dc3545';
            $datas['pointBorderColor'] = '#dc3545';
            $datas['pointBackgroundColor'] = '#dc3545';
            $datas['fill'] = false;
            $datasets[] = $datas;
            $datas['type'] = 'line';
            $datas['data'] = $data2;
            $datas['yAxisID'] = 'A';
            $datas['backgroundColor'] = 'transparent';
            $datas['borderColor'] = '#28a745';
            $datas['pointBorderColor'] = '#28a745';
            $datas['pointBackgroundColor'] = '#28a745';
            $datas['fill'] = false;
            $datasets[] = $datas;
            // $datas['type'] = 'line';
            // $datas['data'] = $data3;
            // $datas['yAxisID'] = 'A';
            // $datas['backgroundColor'] = 'transparent';
            // $datas['borderColor'] = '#17a2b8';
            // $datas['pointBorderColor'] = '#17a2b8';
            // $datas['pointBackgroundColor'] = '#17a2b8';
            // $datas['fill'] = false;
            // $datasets[] = $datas;
            $datas['type'] = 'line';
            $datas['data'] = $data4;
            $datas['yAxisID'] = 'B';
            $datas['backgroundColor'] = 'transparent';
            $datas['borderColor'] = '#0000ff';
            $datas['pointBorderColor'] = '#0000ff';
            $datas['pointBackgroundColor'] = '#0000ff';
            $datas['fill'] = false;
            $datasets[] = $datas;
            $graph['labels'] = $labels;
            $graph['datasets'] = $datasets;
            return $graph;
        }
    }
}