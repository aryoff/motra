@extends('layouts.app')

@section('module_css')
@endsection

@section('content')
<div class="content-wrapper" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="row">
                    <div class="col">
                        <!-- panel Total Komplain -->
                        <div class="info-box mb-3 bg-danger">
                            <span class="info-box-icon"><i class="fas fa-hourglass" aria-hidden="true"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Complain</span>
                                <span class="info-box-number h5" id="totalKomplain">0</span>
                            </div>
                            <span class="info-box-icon"><span id="percentTotalKomplain">0</span> %</span>
                        </div>
                        <div class="card">
                            <div class="card-footer p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Service Level <span class="float-right text-success"> <span id="komplainSL">0</span> %</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Agent T1 <span class="float-right text-success"><span id="komplainAcd">0</span> [<span id="percentKomplainAcd">0</span>%]</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Abandon <span class="float-right text-success"><span id="komplainAbn">0</span> [<span id="percentKomplainAbn">0</span>%]</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <!-- panel Total Registrasi-->
                        <div class="info-box mb-3 bg-warning">
                            <span class="info-box-icon"><i class="fas fa-hourglass" aria-hidden="true"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Registrasi Informasi</span>
                                <span class="info-box-number h5" id="totalRegInfo">0</span>
                            </div>
                            <span class="info-box-icon"><span id="percentTotalRegInfo">0</span> %</span>
                        </div>
                        <div class="card">
                            <div class="card-footer p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Service Level <span class="float-right text-success"> <span id="regInfoSL">0</span> %</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Agent T1 <span class="float-right text-success"><span id="regInfoAcd">0</span> [<span id="percentRegInfoAcd">0</span>%]</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Abandon <span class="float-right text-success"><span id="regInfoAbn">0</span> [<span id="percentRegInfoAbn">0</span>%]</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <!-- panel Total All -->
                        <div class="info-box mb-3 bg-success">
                            <span class="info-box-icon"><i class="fas fa-hourglass" aria-hidden="true"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total All Layanan</span>
                                <span class="info-box-number h5" id="totAll">0</span>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-footer p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Service Level <span class="float-right text-success"> <span id="totAllSL">0</span> %</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Agent T1 <span class="float-right text-success"><span id="totAllAcd">0</span> [<span id="percentTotAllAcd">0</span>%]</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Abandon <span class="float-right text-success"><span id="totAllAbn">0</span> [<span id="percentTotAllAbn">0</span>%]</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> IVR Queue<span class="float-right text-success"><span id="totAllIVRQueue">0</span> [<span id="percentSephiaCDAndTotal">0</span> %]</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- handle by agent T1 -->
                                <div class="info-box mb-3 bg-danger">
                                    <span class="info-box-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Handle By Agent T1 Komplain</span>
                                        <span class="info-box-number"></span>
                                    </div>
                                    {{-- <span class="info-box-icon">%</span> --}}
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-fuchsia">ENG</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Skill</span>
                                                <span class="info-box-number" id="komplainEng"></span>
                                            </div>
                                            <span class="info-box-icon"><span id="percentKomplainEng">0</span> %</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-purple">INA</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Skill</span>
                                                <span class="info-box-number" id="komplainIna"></span>
                                            </div>
                                            <span class="info-box-icon"><span id="percentKomplainIna">0</span> %</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-footer p-0">
                                                <ul class="nav nav-pills flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link"> Answered <span class="float-right text-success" id="komplainAcdEng"></span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link"> Abandon <span class="float-right text-success" id="komplainAbnEng"></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-footer p-0">
                                                <ul class="nav nav-pills flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link"> Answered <span class="float-right text-success" id="komplainAcdIna"></span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link"> Abandon <span class="float-right text-success" id="komplainAbnIna"></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Waiting for agent -->
                                <div class="info-box mb-3 bg-secondary">
                                    <span class="info-box-icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Waiting for Agent</span>
                                        <span class="info-box-number" id="waitingTotal">0</span>
                                    </div>
                                    <span class="info-box-icon" style="display:none">%</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-fuchsia">ENG</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Skill</span>
                                                <span class="info-box-number" id="waitingEng">0</span>
                                            </div>
                                            <span class="info-box-icon" style="display:none">%</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-purple">INA</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Skill</span>
                                                <span class="info-box-number" id="waitingIna">0</span>
                                            </div>
                                            <span class="info-box-icon" style="display:none">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-footer p-0">
                                                <ul class="nav nav-pills flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link"> Handle by Agent <span class="float-right text-success" id="waitingEngConnected">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link"> Abandon <span class="float-right text-success" id="waitingEngAbandon">0</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-footer p-0">
                                                <ul class="nav nav-pills flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link"> Handle by Agent <span class="float-right text-success" id="waitingInaConnected">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link"> Abandon <span class="float-right text-success" id="waitingInaAbandon">0</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- handle by IVR -->
                                <div class="info-box mb-3 bg-primary">
                                    <span class="info-box-icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Handle By IVR Queue</span>
                                        <span class="info-box-number"></span>
                                    </div>
                                    {{-- <span class="info-box-icon">%</span> --}}
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-fuchsia">ENG</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Skill</span>
                                                <span class="info-box-number" id="engIVRTotal">0</span>
                                            </div>
                                            <span class="info-box-icon"><span id="percentEngIVRTotal">0</span> %</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-purple">INA</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Skill</span>
                                                <span class="info-box-number" id="inaIVRTotal">0</span>
                                            </div>
                                            <span class="info-box-icon"><span id="percentInaIVRTotal">0</span> %</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-footer p-0">
                                                <ul class="nav nav-pills flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link"> IVR Success <span class="float-right text-success" id="engIVRInputCallback">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link"> Customer Reject <span class="float-right text-success" id="engIVRTidakInputCallback">0</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-footer p-0">
                                                <ul class="nav nav-pills flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link"> IVR Success <span class="float-right text-success" id="inaIVRInputCallback">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link"> Customer Reject <span class="float-right text-success" id="inaIVRTidakInputCallback">0</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p><small class="text-danger">* Perbedaan total IVR karena berbeda Source Data.</small></p>
                            </div>
                            <div class="col-md-6">
                                <!-- handle by Smart IVR -->
                                <div class="info-box mb-3 bg-yellow">
                                    <span class="info-box-icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Handling By SMART IVR</span>
                                        <span class="info-box-number" id="smartIVRTotal">0</span>
                                    </div>
                                    <span class="info-box-icon" style="display:none;"><span>0</span>%</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-fuchsia">ENG</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Skill</span>
                                                <span class="info-box-number" id="smartIVREng">0</span>
                                            </div>
                                            <span class="info-box-icon"><span id="percentSmartIVREng">0</span>%</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-purple">INA</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Skill</span>
                                                <span class="info-box-number" id="smartIVRIna">0</span>
                                            </div>
                                            <span class="info-box-icon"><span id="percentSmartIVRIna">0</span> %</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-footer p-0">
                                                <ul class="nav nav-pills flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link py-1"> GAMAS <span class="float-right text-success" id="gamasEng">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link py-1"> ISOLIR <span class="float-right text-success" id="isolirEng">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link py-1"> FUP/QUOTA <span class="float-right text-success" id="fupEng">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link py-1"> SEGMENTASI <span class="float-right text-success" id="cekSegmentasiEng">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link py-1"> PROGRESS TIKET <span class="float-right text-success" id="progressTiketEng">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link py-1"> Cust Done <span class="float-right text-success" id="custDoneEng">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link py-1"> FU Agent <span class="float-right text-success" id="fuAgentEng">0</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-footer p-0">
                                                <ul class="nav nav-pills flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link py-1"> GAMAS <span class="float-right text-success" id="gamasIna">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link py-1"> ISOLIR <span class="float-right text-success" id="isolirIna">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link py-1"> FUP/QUOTA <span class="float-right text-success" id="fupIna">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link py-1"> SEGMENTASI <span class="float-right text-success" id="cekSegmentasiIna">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link py-1"> PROGRESS TIKET <span class="float-right text-success" id="progressTiketIna">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link py-1"> Cust Done <span class="float-right text-success" id="custDoneIna">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link py-1"> FU Agent <span class="float-right text-success" id="fuAgentIna">0</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Panel Sephia Daily -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3 id="sephiaCD">0</h3>
                                        <p><strong class="text-secondary">[A]</strong> Enter to Sephia<br><small class="text-secondary">[ A = B + C + D + E + G ]</small></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-server" aria-hidden="true"></i>
                                    </div>
                                    <a href="#" class="small-box-footer mb-1 text-left"> &nbsp;&nbsp;<strong class="text-secondary">[B]</strong> Pelanggan Recall <span class="float-right mr-2" id="sephiaCDRecall">0</span>
                                    </a>
                                    <a href="#" class="small-box-footer mb-1 text-left"> &nbsp;&nbsp;<strong class="text-secondary">[C]</strong> Sisa Order <span class="float-right mr-2" id="sephiaCDSisaOrder">0</span>
                                    </a>
                                    <a href="#" class="small-box-footer mb-1 text-left"> &nbsp;&nbsp;<strong class="text-secondary">[D]</strong> Junk <span class="float-right mr-2" id="sephiaCDJunk">0</span>
                                    </a>
                                    <a href="#" class="small-box-footer mb-1 text-left"> &nbsp;&nbsp;<strong class="text-secondary">[E]</strong> Contacted <span class="float-right mr-2" id="sephiaCDContacted">0</span>
                                    </a>
                                    <a href="#" class="small-box-footer mb-1 text-left"> &nbsp;&nbsp;<strong class="text-secondary">[F]</strong> Eskalasi Langsung <span class="float-right mr-2" id="sephiaCDEskalasiLangsung">0</span>
                                    </a>
                                    <a href="#" class="small-box-footer mb-1 bg-primary">
                                        <div class="row">
                                            <div class="col-5">
                                                <span class="float-left">&nbsp;&nbsp;<strong class="text-secondary">[G]</strong> RNA</span><br> <span class="float-right mr-2" id="sephiaCDRNA">0</span>
                                            </div>
                                            <div class="col-7">
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="float-left">SMS</span> <span class="float-right mr-2" id="sephiaCDSMS">0</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="float-left">WA</span> <span class="float-right mr-2" id="sephiaCDWA">0</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="float-left">Unconfirmed</span> <span class="float-right mr-2" id="sephiaCDUnconfirmed">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="small-box-footer mb-1 text-left bg-success">
                                        <div class="row">
                                            <div class="col-5">
                                                <span class="float-left">&nbsp;&nbsp;<strong class="text-secondary">[H]</strong> ACTION</span>
                                            </div>
                                            <div class="col-7">
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="float-left">Ticketing</span> <span class="float-right mr-2" id="sephiaCDTicketing">0</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="float-left">FCR</span> <span class="float-right mr-2" id="sephiaCDFCR">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Panel Sephia MTD-1 -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3 class="text-white" id="sephiaMTD">0</h3>
                                        <p class="text-white"><strong class="text-secondary">[a]</strong> Monthly Order<br>&nbsp;</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-server" aria-hidden="true"></i>
                                    </div>
                                    <a href="#" class="small-box-footer mb-1 text-left">
                                        <span class="text-white">&nbsp;&nbsp;<strong class="text-secondary">[b]</strong> Pelanggan Recall <span class="float-right mr-2 text-white" id="sephiaMTDRecall">0</span></span>
                                    </a>
                                    <a href="#" class="small-box-footer mb-1 text-left text-white">
                                        <span class="text-white">&nbsp;&nbsp;<strong class="text-secondary">[c]</strong> Sisa Order <span class="float-right mr-2 text-white" id="sephiaMTDSisaOrder">0</span></span>
                                    </a>
                                    <a href="#" class="small-box-footer mb-1 text-left text-white">
                                        <span class="text-white">&nbsp;&nbsp;<strong class="text-secondary">[d]</strong> Junk <span class="float-right mr-2 text-white" id="sephiaMTDJunk">0</span></span>
                                    </a>
                                    <a href="#" class="small-box-footer mb-1 text-left text-white">
                                        <span class="text-white">&nbsp;&nbsp;<strong class="text-secondary">[e]</strong> Contacted <span class="float-right mr-2 text-white" id="sephiaMTDContacted">0</span></span>
                                    </a>
                                    <a href="#" class="small-box-footer mb-1 text-left text-white">
                                        <span class="text-white">&nbsp;&nbsp;<strong class="text-secondary">[f]</strong> Eskalasi Langsung <span class="float-right mr-2 text-white" id="sephiaMTDEskalasiLangsung">0</span></span>
                                    </a>
                                    <a href="#" class="small-box-footer mb-1 text-left bg-primary">
                                        <div class="row">
                                            <div class="col-5">
                                                <span class="float-left text-white">&nbsp;&nbsp;<strong class="text-secondary">[g]</strong> RNA</span><br> <span class="float-right mr-2 text-white" id="sephiaMTDRNA">0</span>
                                            </div>
                                            <div class="col-7">
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="float-left text-white">SMS</span> <span class="float-right mr-2 text-white" id="sephiaMTDSMS">0</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="float-left text-white">WA</span> <span class="float-right mr-2 text-white" id="sephiaMTDWA">0</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="float-left text-white">Unconfirmed</span> <span class="float-right mr-2 text-white" id="sephiaMTDUnconfirmed">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="small-box-footer mb-1 text-left bg-success">
                                        <div class="row">
                                            <div class="col-5">
                                                <span class="float-left text-white">&nbsp;&nbsp;<strong class="text-secondary">[h]</strong> ACTION</span>
                                            </div>
                                            <div class="col-7">
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="float-left text-white">Ticketing</span> <span class="float-right mr-2 text-white" id="sephiaMTDTicketing">0</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <span class="float-left text-white">FCR</span> <span class="float-right mr-2 text-white" id="sephiaMTDFCR">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <!-- Panel Summary -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex mb-1">
                                                    <p class="text-success text-xl">
                                                        <i class="ion ion-ios-refresh-empty" aria-hidden="true"></i>
                                                    </p>
                                                    <p class="d-flex flex-column text-left">
                                                        <span class="font-weight-bold">
                                                            <i class="ion ion-android-arrow-up text-success" aria-hidden="true"></i> Result Detail </span>
                                                        <span class="text-muted">&nbsp</span>
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="col border-bottom border-top pb-2">
                                                        <span class="text-muted float-left">Summary Answered</span><span class="float-right" id="summaryAnswered">0</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col border-bottom pb-2">
                                                        <span class="text-muted float-left">Summary Abandon</span><span class="float-right" id="summaryAbandoned">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex mb-1">
                                                    <p class="text-success text-xl">
                                                        <i class="ion ion-ios-refresh-empty" aria-hidden="true"></i>
                                                    </p>
                                                    <p class="d-flex flex-column text-left">
                                                        <span class="font-weight-bold">
                                                            <i class="ion ion-android-arrow-up text-success" aria-hidden="true"></i><span id="avgTimeToPickup">00:00:00</span></span>
                                                        <span class="text-muted">Average Time to Pick-Up</span>
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="col border-bottom border-top pb-2">
                                                        <span class="text-muted float-left">Summary Input Callback</span><span class="float-right" id="summaryIVRInputCallback">0</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col border-bottom pb-2">
                                                        <span class="text-muted float-left">Summary Tidak Input Callback</span><span class="float-right" id="summaryIVRTidakInputCallback">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <!-- Panel Grafik -->
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg"></span>
                                        <span>Complain Interval</span>
                                    </p>
                                    <p class="ml-auto d-flex flex-column text-right">
                                        <span class="text-success">
                                            <i class="fas fa-calendar" aria-hidden="true"></i> Last Updated  <span class="font-weight-bold"><span id="lastUpdateH">0</span>:<span id="lastUpdateM">0</span></span></span>
                                        <span class="text-muted">Traffic Trend Today</span>
                                    </p>
                                </div>
                                <div class="position-relative mb-4" style="height:168px;">
                                    <canvas id="traffic-chart"></canvas>
                                </div>
                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-primary" aria-hidden="true"></i> %Masuk Agent </span>
                                    <span class="mr-2">
                                        <i class="fas fa-square text-danger" aria-hidden="true"></i> COF </span>
                                    <span class="mr-2">
                                        <i class="fas fa-square text-success" aria-hidden="true"></i> Agent T1 </span>
                                    <span style="display: none;">
                                        <i class="fas fa-square text-info" aria-hidden="true"></i> IVR </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <router-view></router-view>
</div>
@endsection

@section('module_js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var timerCounter = 4000;
    var populateRun = false;
    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }

    var mode = 'index';
    var intersect = true;
    var $trafficChart = $('#traffic-chart');
    var chartData;
    var trafficChart;
    trafficChart = new Chart($trafficChart, {
        options : 
            {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        id: 'A',
                        type: 'linear',
                        position: 'left',
                        scaleLabel: {
                            display: true,
                            // labelString: 'COF/ACD',
                            fontColor: '#dc3545af',
                            fontStyle: 'bold'
                        },
                        gridLines: {
                            display: true,
                            lineWidth: '4px',
                            color: 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                        },
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#dc3545af',
                            fontStyle: 'bold'
                        }
                    }, {
                        id: 'B',
                        type: 'linear',
                        position: 'right',
                        scaleLabel: {
                            display: true,
                            labelString: '(%)',
                            fontColor: '#0000ff',
                            fontStyle: 'bold'
                        },
                        gridLines: {
                            display: true,
                            lineWidth: '4px',
                            color: 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                        },
                        ticks: {
                            suggestedMax: 100,
                            beginAtZero: true,
                            fontColor: '#3498DB',
                            fontStyle: 'bold'
                        }
                    }],
                    xAxes: [{
                        display: true,
                        // stacked: true,
                        gridLines: {
                            display: false
                        },
                        ticks: ticksStyle
                    }]
                }
            }
    });

    var originalHeight;
    window.onresize = function (event) {
        if((window.fullScreen) || (window.innerWidth == screen.width && window.innerHeight == screen.height)) {
            document.getElementById("navbar").style.top = "-30px";
            originalHeight = document.getElementById("navbar").style.height;
            document.getElementById("navbar").style.height = "10px";
            document.getElementById("footer").style.display = "none";
        } else {
            document.getElementById("navbar").style.height = originalHeight;
            document.getElementById("navbar").style.top = "0";
            document.getElementById("footer").style.display = "block";
        }
    }

    $(document).ready(function () {
        populateRun = true;
        populateRun = populate_data_wallboard();
        setInterval(function () {
            if (!populateRun) {
                populateRun = true;
                populateRun = populate_data_wallboard();
            }
        }, 60000);
    });
</script>
@endsection
