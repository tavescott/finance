<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive pt-3">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Shughuli</th>
                            <th>Kiasi (TZS)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mauzo</td>
                            <td>{{number_format($transactions['sales'])}}</td>
                        </tr>
                        <tr>
                            <td>Manunuzi</td>
                            <td>{{number_format($transactions['purchases'])}}</td>
                        </tr>
                        <tr>
                            <td>Matumizi</td>
                            <td>{{number_format($transactions['expenses'])}}</td>
                        </tr>
                        <tr class="@if($transactions['state'] == "Profit") table-success @elseif($transactions['state'] == "Loss") table-danger @else table-secondary @endif">
                            <td>
                                <b>
                                    @if($transactions['state'] == "Profit")
                                        Faida
                                    @elseif($transactions['state'] == "Loss")
                                        Hasara
                                    @else
                                        Faida/Hasara
                                    @endif
                                </b>
                            </td>
                            <td style="border-bottom: 4px double @if($transactions['state'] == "Profit") green @elseif($transactions['state'] == "Loss") red @endif; border-top: 2px solid @if($transactions['state'] == "Profit") green @elseif($transactions['state'] == "Loss") red @endif">
                                <span style="font-size: 18px"><b>{{number_format($transactions['sum'])}}</b></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="template-demo d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-primary btn-sm btn-icon-text d-flex align-items-center">
                    <i class="ti-download btn-icon-prepend"></i>
                    Pakua
                </button>
                <button type="button" class="btn btn-info btn-sm btn-icon-text d-flex align-items-center">
                    <i class="ti-printer btn-icon-prepend"></i>
                    Chapisha
                </button>
            </div>
        </div>
    </div>
</div>
