@php
$result = [];
for ($i = -8.0; $i <= 8.0; $i +=0.25) { $result[]=$i; } @endphp <div class="table-wholesale">
    <div class="vertical-header text-center fw-bold text-uppercase py-3 text-white fs-2 border">
        Độ cầu
    </div>
    <div class="horizontal-header text-center fw-bold text-uppercase py-3 text-white fs-2 border">Độ loạn</div>

    <div class="tbl-items p-0">
        <table class="tbl-wholesale">
            <thead>
                <tr>
                    <th class="border">

                    </th>
                    @foreach ($result as $DLvalue)
                    <th class="text-center border horizontal-value">{{ $DLvalue }}</th>
                    @endforeach
                </tr>

            </thead>
            <tbody>
                @foreach ($result as $DCvalue)
                <tr>
                    <th class="text-center vertical-value">{{ $DCvalue }}</th>
                    @foreach ($result as $DLvalue)
                    <td>
                        <input type="number" name="" id="{{ $DLvalue . ',' . $DCvalue }}" style="width:70px"
                            class="form-control shadow-none" min="0">
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>