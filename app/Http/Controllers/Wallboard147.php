<?php

namespace App\Http\Controllers;

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
            $temp['acceptable'] = $value->acceptable;
            $total_skill_cms[$value->split] = $temp;
        }
        $waiting_for_agent = $this->waiting_for_agent();
        $detail_sephia = $this->detail_sephia();
        $detail_sephia_mtd_sisa = $this->detail_sephia_mtd_sisa();
        $detail_ivr = $this->detail_ivr();
        $smart_ivr_keylog = $this->smart_ivr_keylog();
        $smart_ivr_cust_done = $this->smart_ivr_cust_done();
        date_default_timezone_set('Asia/Jakarta');
        $t = time();
        $response['singleNum'] = array(
            'totalKomplain' => $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls'],
            'percentTotalKomplain' => $this->percentage($total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls'], $total_skill_cms[53]['acdcalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['acdcalls'] + $total_skill_cms[54]['abncalls'] + $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls']),
            'komplainSL' => $this->percentage($total_skill_cms[2]['acceptable'] + $total_skill_cms[5]['acceptable'], $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls']),
            'komplainIna' => $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'],
            'percentKomplainIna' => $this->percentage($total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'], $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls']),
            'komplainEng' => $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls'],
            'percentKomplainEng' => $this->percentage($total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls'], $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls']),
            'komplainAcd' => $total_skill_cms[2]['acdcalls'] + $total_skill_cms[5]['acdcalls'],
            'percentKomplainAcd' => $this->percentage($total_skill_cms[2]['acdcalls'] + $total_skill_cms[5]['acdcalls'], $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls']),
            'komplainAcdIna' => $total_skill_cms[2]['acdcalls'],
            'komplainAcdEng' => $total_skill_cms[5]['acdcalls'],
            'komplainAbn' => $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['abncalls'],
            'percentKomplainAbn' => $this->percentage($total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['abncalls'], $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls']),
            'komplainAbnIna' => $total_skill_cms[2]['abncalls'],
            'komplainAbnEng' => $total_skill_cms[5]['abncalls'],
            'totalRegInfo' => $total_skill_cms[53]['acdcalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['acdcalls'] + $total_skill_cms[54]['abncalls'],
            'regInfoSL' => $this->percentage($total_skill_cms[53]['acceptable'] + $total_skill_cms[54]['acceptable'], $total_skill_cms[53]['acdcalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['acdcalls'] + $total_skill_cms[54]['abncalls']),
            'percentTotalRegInfo' => $this->percentage($total_skill_cms[53]['acdcalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['acdcalls'] + $total_skill_cms[54]['abncalls'], $total_skill_cms[53]['acdcalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['acdcalls'] + $total_skill_cms[54]['abncalls'] + $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls']),
            'regInfoAcd' => $total_skill_cms[53]['acdcalls'] + $total_skill_cms[54]['acdcalls'],
            'percentRegInfoAcd' => $this->percentage($total_skill_cms[53]['acdcalls'] + $total_skill_cms[54]['acdcalls'], $total_skill_cms[53]['acdcalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['acdcalls'] + $total_skill_cms[54]['abncalls']),
            'regInfoAbn' => $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['abncalls'],
            'percentRegInfoAbn' => $this->percentage($total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['abncalls'], $total_skill_cms[53]['acdcalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['acdcalls'] + $total_skill_cms[54]['abncalls']),
            'totAll' => $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls'] + $total_skill_cms[53]['acdcalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['acdcalls'] + $total_skill_cms[54]['abncalls'] + $detail_sephia->onprogress + $detail_sephia->unconsumed + $detail_sephia->connected_to_t1 + $detail_sephia->contacted + $detail_sephia->rna + $detail_sephia->junk,
            'totAllSL' => $this->percentage($total_skill_cms[2]['acceptable'] + $total_skill_cms[5]['acceptable'] + $total_skill_cms[53]['acceptable'] + $total_skill_cms[54]['acceptable'], $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls'] + $total_skill_cms[53]['acdcalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['acdcalls'] + $total_skill_cms[54]['abncalls']),
            'totAllAcd' => $total_skill_cms[2]['acdcalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[53]['acdcalls'] + $total_skill_cms[54]['acdcalls'],
            'percentTotAllAcd' => $this->percentage($total_skill_cms[2]['acdcalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[53]['acdcalls'] + $total_skill_cms[54]['acdcalls'], $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls'] + $total_skill_cms[53]['acdcalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['acdcalls'] + $total_skill_cms[54]['abncalls'] + $detail_sephia->onprogress + $detail_sephia->unconsumed + $detail_sephia->connected_to_t1 + $detail_sephia->contacted + $detail_sephia->rna + $detail_sephia->junk),
            'totAllAbn' => $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['abncalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['abncalls'],
            'percentTotAllAbn' => $this->percentage($total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['abncalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['abncalls'], $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls'] + $total_skill_cms[53]['acdcalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['acdcalls'] + $total_skill_cms[54]['abncalls'] + $detail_sephia->onprogress + $detail_sephia->unconsumed + $detail_sephia->connected_to_t1 + $detail_sephia->contacted + $detail_sephia->rna + $detail_sephia->junk),
            'sephiaCDUnconfirmed' => $detail_sephia->bk,
            'sephiaCDWA' => $detail_sephia->wa,
            'sephiaCDSMS' => $detail_sephia->sms,
            'sephiaCDRNA' => $detail_sephia->rna,
            'sephiaCDEskalasiLangsung' => $detail_sephia->eskalasi_langsung,
            'sephiaCDContacted' => $detail_sephia->contacted,
            'sephiaCDJunk' => $detail_sephia->junk,
            'sephiaCDSisaOrder' => $detail_sephia->onprogress + $detail_sephia->unconsumed,
            'sephiaCDRecall' => $detail_sephia->connected_to_t1,
            'sephiaCDFCR' => $detail_sephia->fcr,
            'sephiaCDTicketing' => $detail_sephia->tiketing,
            'sephiaCD' => $detail_sephia->onprogress + $detail_sephia->unconsumed + $detail_sephia->connected_to_t1 + $detail_sephia->contacted + $detail_sephia->rna + $detail_sephia->junk,
            'totAllIVRQueue' => $detail_sephia->onprogress + $detail_sephia->unconsumed + $detail_sephia->connected_to_t1 + $detail_sephia->contacted + $detail_sephia->rna + $detail_sephia->junk,
            'percentSephiaCDAndTotal' => $this->percentage($detail_sephia->onprogress + $detail_sephia->unconsumed + $detail_sephia->connected_to_t1 + $detail_sephia->contacted + $detail_sephia->rna + $detail_sephia->junk, $detail_sephia->onprogress + $detail_sephia->unconsumed + $detail_sephia->connected_to_t1 + $detail_sephia->contacted + $detail_sephia->rna + $detail_sephia->junk + $total_skill_cms[2]['acdcalls'] + $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['acdcalls'] + $total_skill_cms[5]['abncalls'] + $total_skill_cms[53]['acdcalls'] + $total_skill_cms[53]['abncalls'] + $total_skill_cms[54]['acdcalls'] + $total_skill_cms[54]['abncalls']),
            'sephiaMTDUnconfirmed' => $detail_sephia_mtd_sisa->bk,
            'sephiaMTDWA' => $detail_sephia_mtd_sisa->wa,
            'sephiaMTDSMS' => $detail_sephia_mtd_sisa->sms,
            'sephiaMTDRNA' => $detail_sephia_mtd_sisa->rna,
            'sephiaMTDEskalasiLangsung' => $detail_sephia_mtd_sisa->eskalasi_langsung,
            'sephiaMTDContacted' => $detail_sephia_mtd_sisa->contacted,
            'sephiaMTDJunk' => $detail_sephia_mtd_sisa->junk,
            'sephiaMTDSisaOrder' => $detail_sephia_mtd_sisa->onprogress + $detail_sephia_mtd_sisa->unconsumed,
            'sephiaMTDRecall' => $detail_sephia_mtd_sisa->connected_to_t1,
            'sephiaMTDFCR' => $detail_sephia_mtd_sisa->fcr,
            'sephiaMTDTicketing' => $detail_sephia_mtd_sisa->tiketing,
            'sephiaMTD' => $detail_sephia_mtd_sisa->onprogress + $detail_sephia_mtd_sisa->unconsumed + $detail_sephia_mtd_sisa->connected_to_t1 + $detail_sephia_mtd_sisa->contacted + $detail_sephia_mtd_sisa->rna + $detail_sephia_mtd_sisa->junk,
            'inaIVRInputCallback' => $detail_ivr->ina_input_callback,
            'inaIVRTidakInputCallback' => $detail_ivr->ina_tidak_input_callback,
            'inaIVRTotal' => $detail_ivr->ina_input_callback + $detail_ivr->ina_tidak_input_callback,
            'percentInaIVRTotal' => $this->percentage($detail_ivr->ina_input_callback + $detail_ivr->ina_tidak_input_callback, $detail_ivr->ina_input_callback + $detail_ivr->ina_tidak_input_callback),
            'waitingTotal' => $waiting_for_agent->ina_cof + $waiting_for_agent->eng_cof,
            'waitingIna' => $waiting_for_agent->ina_cof,
            'waitingEng' => $waiting_for_agent->eng_cof,
            'waitingInaConnected' => $waiting_for_agent->ina_connected,
            'waitingEngConnected' => $waiting_for_agent->eng_connected,
            'waitingInaAbandon' => $waiting_for_agent->ina_abandon,
            'waitingEngAbandon' => $waiting_for_agent->eng_abandon,
            'smartIVRTotal' => $smart_ivr_keylog->total,
            'smartIVRIna' => $smart_ivr_keylog->total_ina,
            'percentSmartIVRIna' => $this->percentage($smart_ivr_keylog->total_ina, $smart_ivr_keylog->total),
            'percentSmartIVREng' => $this->percentage($smart_ivr_keylog->total_eng, $smart_ivr_keylog->total),
            'smartIVREng' => $smart_ivr_keylog->total_eng,
            'gamasIna' => $smart_ivr_keylog->gamas_ina,
            'isolirIna' => $smart_ivr_keylog->isolir_ina,
            'fupIna' => $smart_ivr_keylog->fup_ina,
            'cekSegmentasiIna' => $smart_ivr_keylog->cek_segmentasi_ina,
            'progressTiketIna' => $smart_ivr_keylog->progress_tiket_ina,
            'custDoneIna' => $smart_ivr_cust_done->cust_done_ina,
            'fuAgentIna' => $smart_ivr_keylog->fu_agent_ina,
            'gamasEnng' => $smart_ivr_keylog->gamas_eng,
            'isolirEng' => $smart_ivr_keylog->isolir_eng,
            'fupEng' => $smart_ivr_keylog->fup_eng,
            'cekSegmentasiEng' => $smart_ivr_keylog->cek_segmentasi_eng,
            'progressTiketEng' => $smart_ivr_keylog->progress_tiket_eng,
            'custDoneEng' => $smart_ivr_cust_done->cust_done_eng,
            'fuAgentEng' => $smart_ivr_keylog->fu_agent_eng,
            'summaryAnswered' => $total_skill_cms[2]['acdcalls'] + $total_skill_cms[5]['acdcalls'],
            'summaryAbandoned' => $total_skill_cms[2]['abncalls'] + $total_skill_cms[5]['abncalls'],
            'summaryIVRInputCallback' => $detail_ivr->ina_input_callback,
            'summaryIVRTidakInputCallback' => $detail_ivr->ina_tidak_input_callback,
            'lastUpdateH' => date("H", $t),
            'lastUpdateM' => date("i", $t)
        );
        $response['avgTimeToPickup'] = $this->avg_time_to_pickup()->average;
        $response['dailyInterval'] = $this->daily_interval();
        return response()->json($response, 200);
    }

    function percentage($value, $divider)
    {
        if ($divider == 0) {
            return 0;
        } else {
            return floor(($value / $divider) * 100);
        }
    }

    function total_skill_cms()
    {
        return DB::connection('cms_mysql')->select('SELECT split,SUM(acdcalls) acdcalls,SUM(abncalls) abncalls,SUM(acceptable) acceptable FROM (SELECT split,SUM(acdcalls) acdcalls,SUM(abncalls) abncalls,SUM(acdcalls1+acdcalls2+acdcalls3+acdcalls4) acceptable FROM hsplit WHERE row_date=CURRENT_DATE AND split IN (1,2,3,4,5,6,53,54) GROUP BY split UNION ALL SELECT split,acdcalls,abncalls,(acdcalls1+acdcalls2+acdcalls3+acdcalls4) acceptable FROM csplit WHERE split IN (1,2,3,4,5,6,53,54)) csplit GROUP BY split');
    }

    function waiting_for_agent()
    {
        return DB::connection('sephia_pgsql')->select("SELECT SUM (CASE WHEN dispsplit=2 THEN 1 ELSE 0 END) AS ina_cof,SUM (CASE WHEN dispsplit=2 AND call_disp='3' THEN 1 ELSE 0 END) AS ina_abandon,SUM (CASE WHEN dispsplit=2 AND anslogin<> '' THEN 1 ELSE 0 END) AS ina_connected,SUM (CASE WHEN dispsplit=5 THEN 1 ELSE 0 END) AS eng_cof,SUM (CASE WHEN dispsplit=5 AND call_disp='3' THEN 1 ELSE 0 END) AS eng_abandon,SUM (CASE WHEN dispsplit=5 AND anslogin<> '' THEN 1 ELSE 0 END) AS eng_connected FROM echi_billing WHERE segstart :: DATE=CURRENT_DATE AND queuetime> 0;")[0];
    }

    function avg_time_to_pickup()
    {
        return DB::connection('sephia_pgsql')->select("SELECT concat (CASE WHEN ((COALESCE (AVG,0) :: INTEGER/60)/60)< 10 THEN '0' ELSE '' END,((COALESCE (AVG,0) :: INTEGER/60)/60),':',CASE WHEN ((COALESCE (AVG,0) :: INTEGER/60) % 60)< 10 THEN '0' ELSE '' END,((COALESCE (AVG,0) :: INTEGER/60) % 60),':',CASE WHEN (COALESCE (AVG,0) :: INTEGER % 60)< 10 THEN '0' ELSE '' END,(COALESCE (AVG,0) :: INTEGER % 60)) AS average FROM (SELECT FLOOR (AVG (((DATE_PART('day',datetime_callback-to_timestamp((dynamic_ticket_data.DATA->> 'datetime') :: FLOAT) :: TIMESTAMP)*24+DATE_PART ('hour',datetime_callback-to_timestamp((dynamic_ticket_data.DATA->> 'datetime') :: FLOAT) :: TIMESTAMP))*60+DATE_PART ('minute',datetime_callback-to_timestamp((dynamic_ticket_data.DATA->> 'datetime') :: FLOAT) :: TIMESTAMP))*60+DATE_PART ('second',datetime_callback-to_timestamp((dynamic_ticket_data.DATA->> 'datetime') :: FLOAT) :: TIMESTAMP))) AS AVG FROM (SELECT no_tiket,MIN (datetime_callback) AS datetime_callback FROM callback_manja WHERE date_callback=CURRENT_DATE AND \"order\"=2 GROUP BY no_tiket) callback_manja INNER JOIN dynamic_ticket_data ON callback_manja.no_tiket=dynamic_ticket_data.unique_key->> 'serial_increment' AND DATA->> 'source'='ivr_gamas' AND (DATA->> 'datetime') :: FLOAT> EXTRACT (EPOCH FROM to_timestamp(concat (CURRENT_DATE,' 08:00:00'),'YYYY-MM-DD HH:MI:SS'))) TEMP")[0];
    }

    function smart_ivr_keylog()
    {
        return DB::connection('sephia_pgsql')->select("SELECT COALESCE (SUM (CASE WHEN node IN ('S012','S013','S014','S018','S019') THEN 1 ELSE 0 END),0) AS total,COALESCE (SUM (CASE WHEN lang='3' AND node IN ('S012','S013','S014','S018','S019') THEN 1 ELSE 0 END),0) AS total_ina,COALESCE (SUM (CASE WHEN lang='13' AND node IN ('S012','S013','S014','S018','S019') THEN 1 ELSE 0 END),0) AS total_eng,COALESCE (SUM (CASE WHEN lang='3' AND node='S012' THEN 1 ELSE 0 END),0) AS gamas_ina,COALESCE (SUM (CASE WHEN lang='3' AND node='S013' THEN 1 ELSE 0 END),0) AS isolir_ina,COALESCE (SUM (CASE WHEN lang='3' AND node='S014' THEN 1 ELSE 0 END),0) AS fup_ina,COALESCE (SUM (CASE WHEN lang='3' AND node='S018' THEN 1 ELSE 0 END),0) AS cek_segmentasi_ina,COALESCE (SUM (CASE WHEN lang='3' AND node='S019' THEN 1 ELSE 0 END),0) AS progress_tiket_ina,COALESCE (SUM (CASE WHEN lang='13' AND node='S012' THEN 1 ELSE 0 END),0) AS gamas_eng,COALESCE (SUM (CASE WHEN lang='13' AND node='S013' THEN 1 ELSE 0 END),0) AS isolir_eng,COALESCE (SUM (CASE WHEN lang='13' AND node='S014' THEN 1 ELSE 0 END),0) AS fup_eng,COALESCE (SUM (CASE WHEN lang='13' AND node='S018' THEN 1 ELSE 0 END),0) AS cek_segmentasi_eng,COALESCE (SUM (CASE WHEN lang='13' AND node='S019' THEN 1 ELSE 0 END),0) AS progress_tiket_eng,COALESCE (SUM (CASE WHEN lang='3' AND node IN ('S900','S901','S902','S903','S904','S905') THEN 1 ELSE 0 END),0) AS fu_agent_ina,COALESCE (SUM (CASE WHEN lang='13' AND node IN ('S900','S901','S902','S903','S904','S905') THEN 1 ELSE 0 END),0) AS fu_agent_eng FROM keylog WHERE DATE :: DATE=CURRENT_DATE")[0];
    }

    function smart_ivr_cust_done()
    {
        return DB::connection('sephia_pgsql')->select("SELECT COALESCE(SUM(CASE WHEN lang='3' THEN 1 ELSE 0 END),0) AS cust_done_ina,COALESCE(SUM(CASE WHEN lang='13' THEN 1 ELSE 0 END),0) AS cust_done_eng FROM keylog WHERE date::date = CURRENT_DATE AND node IN ('S012','S013','S014') AND ani NOT IN (SELECT ani FROM keylog WHERE date::date = CURRENT_DATE AND node IN ('S900','S901','S902','S903','S904','S905'))")[0];
    }

    function detail_ivr()
    {
        return DB::connection('sephia_pgsql')->select("SELECT COALESCE(SUM(CASE WHEN (data->>'j_gangguan' <> '' AND data->>'no_fastel1' <> '') THEN 1 ELSE 0 END),0) AS ina_input_callback,COALESCE(SUM(CASE WHEN NOT (data->>'j_gangguan' <> '' AND data->>'no_fastel1' <> '') THEN 1 ELSE 0 END),0) AS ina_tidak_input_callback FROM dynamic_ticket_data WHERE (data->>'date')::DATE = CURRENT_DATE AND data->>'source' = 'ivr_gamas'")[0];
    }

    function detail_sephia()
    {
        return DB::connection('sephia_pgsql')->select("SELECT*FROM (SELECT COALESCE(SUM (CASE WHEN status=0 THEN 1 ELSE 0 END),0) AS unconsumed,COALESCE(SUM (CASE WHEN status=1 THEN 1 ELSE 0 END),0) AS contacted,COALESCE(SUM (CASE WHEN status=2 THEN 1 ELSE 0 END),0) AS RNA,COALESCE(SUM (CASE WHEN status=3 THEN 1 ELSE 0 END),0) AS junk,COALESCE(SUM (CASE WHEN status=98 THEN 1 ELSE 0 END),0) AS onprogress,COALESCE(SUM (CASE WHEN status=99 THEN 1 ELSE 0 END),0) AS connected_to_t1 FROM dynamic_ticket_data WHERE (DATA->> 'date') :: DATE=CURRENT_DATE AND DATA->> 'source'='ivr_gamas') dyn_data,(SELECT COALESCE (SUM (CASE WHEN kat=32 THEN 1 ELSE 0 END),0) AS eskalasi_langsung,COALESCE (SUM (CASE WHEN subkat1=84 OR subkat2=43 OR subkat1=138 THEN 1 ELSE 0 END),0) AS fcr,COALESCE (SUM (CASE WHEN subkat1=85 OR subkat1=139 OR subkat2=44 THEN 1 ELSE 0 END),0) AS tiketing FROM (SELECT callback_interaksi_log.*FROM callback_interaksi_log INNER JOIN (SELECT unique_key->> 'serial_increment' AS serial_increment FROM dynamic_ticket_data WHERE (DATA->> 'date') :: DATE=CURRENT_DATE AND DATA->> 'source'='ivr_gamas') dynamic_ticket_data ON callback_interaksi_log.id_order=dynamic_ticket_data.serial_increment) callback_interaksi_log WHERE \"order\"=2 AND segstart :: DATE=CURRENT_DATE) log,(SELECT COALESCE(SUM (CASE WHEN additional_data-> 'sms'->> 'status'='SENT' THEN 1 ELSE 0 END),0) AS sms,COALESCE(SUM (CASE WHEN additional_data-> 'wa'->> 'status'='SENT' THEN 1 ELSE 0 END),0) AS wa,COALESCE(SUM (CASE WHEN status='NOT CONTACTED' AND COALESCE (additional_data-> 'sms'->> 'status','')<> 'SENT' AND COALESCE (additional_data-> 'wa'->> 'status','')<> 'SENT' THEN 1 ELSE 0 END),0) AS bk FROM (SELECT callback_manja.*FROM callback_manja INNER JOIN (SELECT unique_key->> 'serial_increment' AS serial_increment FROM dynamic_ticket_data WHERE (DATA->> 'date') :: DATE=CURRENT_DATE AND DATA->> 'source'='ivr_gamas') dynamic_ticket_data ON callback_manja.no_tiket=dynamic_ticket_data.serial_increment WHERE \"order\"=2 AND date_callback=CURRENT_DATE) callback_manja) manja")[0];
    }

    function detail_sephia_mtd_sisa()
    {
        return DB::connection('sephia_pgsql')->select("SELECT*FROM (SELECT COALESCE(SUM (CASE WHEN status=0 THEN 1 ELSE 0 END),0) AS unconsumed,COALESCE(SUM (CASE WHEN status=1 THEN 1 ELSE 0 END),0) AS contacted,COALESCE(SUM (CASE WHEN status=2 THEN 1 ELSE 0 END),0) AS RNA,COALESCE(SUM (CASE WHEN status=3 THEN 1 ELSE 0 END),0) AS junk,COALESCE(SUM (CASE WHEN status=98 THEN 1 ELSE 0 END),0) AS onprogress,COALESCE(SUM (CASE WHEN status=99 THEN 1 ELSE 0 END),0) AS connected_to_t1 FROM dynamic_ticket_data WHERE (DATA->> 'date') :: DATE BETWEEN DATE_TRUNC('MONTH',CURRENT_DATE) :: DATE AND CURRENT_DATE-INTERVAL '1 DAY' AND DATA->> 'source'='ivr_gamas') dyn_data,(SELECT COALESCE (SUM (CASE WHEN kat=32 THEN 1 ELSE 0 END),0) AS eskalasi_langsung,COALESCE (SUM (CASE WHEN subkat1=84 OR subkat2=43 OR subkat1=138 THEN 1 ELSE 0 END),0) AS fcr,COALESCE (SUM (CASE WHEN subkat1=85 OR subkat1=139 OR subkat2=44 THEN 1 ELSE 0 END),0) AS tiketing FROM (SELECT callback_interaksi_log.*FROM callback_interaksi_log INNER JOIN (SELECT unique_key->> 'serial_increment' AS serial_increment FROM dynamic_ticket_data WHERE (DATA->> 'date') :: DATE BETWEEN DATE_TRUNC('MONTH',CURRENT_DATE) :: DATE AND CURRENT_DATE-INTERVAL '1 DAY' AND DATA->> 'source'='ivr_gamas') dynamic_ticket_data ON callback_interaksi_log.id_order=dynamic_ticket_data.serial_increment) callback_interaksi_log WHERE \"order\"=2 AND segstart :: DATE BETWEEN DATE_TRUNC('MONTH',CURRENT_DATE) :: DATE AND CURRENT_DATE-INTERVAL '1 DAY') log,(SELECT COALESCE(SUM (CASE WHEN additional_data-> 'sms'->> 'status'='SENT' THEN 1 ELSE 0 END),0) AS sms,COALESCE(SUM (CASE WHEN additional_data-> 'wa'->> 'status'='SENT' THEN 1 ELSE 0 END),0) AS wa,COALESCE(SUM (CASE WHEN status='NOT CONTACTED' AND COALESCE (additional_data-> 'sms'->> 'status','')<> 'SENT' AND COALESCE (additional_data-> 'wa'->> 'status','')<> 'SENT' THEN 1 ELSE 0 END),0) AS bk FROM (SELECT callback_manja.*FROM callback_manja INNER JOIN (SELECT unique_key->> 'serial_increment' AS serial_increment FROM dynamic_ticket_data WHERE (DATA->> 'date') :: DATE BETWEEN DATE_TRUNC('MONTH',CURRENT_DATE) :: DATE AND CURRENT_DATE-INTERVAL '1 DAY' AND DATA->> 'source'='ivr_gamas') dynamic_ticket_data ON callback_manja.no_tiket=dynamic_ticket_data.serial_increment WHERE \"order\"=2 AND date_callback BETWEEN DATE_TRUNC('MONTH',CURRENT_DATE) :: DATE AND CURRENT_DATE-INTERVAL '1 DAY') callback_manja) manja")[0];
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
            $datas['pointBorderColor'] = $datas['borderColor'];
            $datas['pointBackgroundColor'] = $datas['borderColor'];
            $datas['fill'] = false;
            $datasets[] = $datas;
            $datas['type'] = 'line';
            $datas['data'] = $data2;
            $datas['yAxisID'] = 'A';
            $datas['backgroundColor'] = 'transparent';
            $datas['borderColor'] = '#28a745';
            $datas['pointBorderColor'] = $datas['borderColor'];
            $datas['pointBackgroundColor'] = $datas['borderColor'];
            $datas['fill'] = false;
            $datasets[] = $datas;
            // $datas['type'] = 'line';
            // $datas['data'] = $data3;
            // $datas['yAxisID'] = 'A';
            // $datas['backgroundColor'] = 'transparent';
            // $datas['borderColor'] = '#17a2b8';
            // $datas['pointBorderColor'] = $datas['borderColor'];
            // $datas['pointBackgroundColor'] = $datas['borderColor'];
            // $datas['fill'] = false;
            // $datasets[] = $datas;
            $datas['type'] = 'line';
            $datas['data'] = $data4;
            $datas['yAxisID'] = 'B';
            $datas['backgroundColor'] = 'transparent';
            $datas['borderColor'] = '#0000ff';
            $datas['pointBorderColor'] = $datas['borderColor'];
            $datas['pointBackgroundColor'] = $datas['borderColor'];
            $datas['fill'] = false;
            $datasets[] = $datas;
            $graph['labels'] = $labels;
            $graph['datasets'] = $datasets;
            return $graph;
        }
    }
}